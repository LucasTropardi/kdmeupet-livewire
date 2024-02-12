<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
    // Executando a consulta para obter a coleção de animais
    var animais = @json($animais->get()); // Convertendo a coleção de animais para JSON

    var icons = {
        achado: "{{ asset('images/local2.png') }}",
        perdido: "{{ asset('images/local1.png') }}"
    };

    var markers = []; // Array para armazenar os marcadores

    document.addEventListener('DOMContentLoaded', function () {
        var southWest = L.latLng(-21.465, -50.15);
        var northEast = L.latLng(-21.385, -49.99);
        var bounds = L.latLngBounds(southWest, northEast);

        var mapShow = L.map('mapa', {
            maxBounds: bounds,
            maxZoom: 18,
            minZoom: 12
        });

        mapShow.fitBounds(bounds); // Ajusta o mapa aos limites definidos

        animais.forEach(function(animal) { // Loop sobre cada animal
            var iconUrl = animal.situacao_id == 3 ? icons.achado : icons.perdido;
            var situacao = animal.situacao_id == 3 ? 'Achado' : 'Perdido';
            var fotoUrl = "{{ asset('storage/uploads/animais/') }}" + "/" + animal.anFoto;

            var customIcon = L.icon({
                iconUrl: iconUrl,
                iconSize: [65, 70], // Tamanho do ícone
                iconAnchor: [22, 94], // Ponto do ícone que corresponderá à localização do marcador no mapa
                popupAnchor: [-3, -76] // Ponto a partir do qual o popup deve abrir em relação ao `iconAnchor`
            });

            var popupContent = "<div><img src='" + fotoUrl + "' style='max-width: 150px;'><br><b>Nome:</b> " + animal.anNome + "<br><b>Situação:</b> " + situacao + "</div>";

            var marker = L.marker([animal.latitude, animal.longitude], {icon: customIcon}).addTo(mapShow);
            marker.bindPopup(popupContent); // Adiciona uma janela pop-up com informações do animal

            markers.push(marker); // Adiciona o marcador ao array de marcadores
        });

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(mapShow);
    });
</script>
