document.addEventListener('DOMContentLoaded', function () {
    // Função para inicializar o mapa
    function initMap() {
        // Coordenadas para limitar o mapa ao município de Penápolis
        let southWest = L.latLng(-21.465, -50.15);
        let northEast = L.latLng(-21.385, -49.99);
        let bounds = L.latLngBounds(southWest, northEast);

        let map = L.map('map', {
            maxBounds: bounds, // Limitar o mapa ao município de Penápolis
            maxZoom: 18,
            minZoom: 12
        }).setView([-21.41908221945518, -50.07632303277206], 13);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        let marker = null; // Variável para armazenar o marcador

        map.on('click', function (e) {
            let lat = e.latlng.lat;
            let lng = e.latlng.lng;

            // Atualize os campos de latitude e longitude se existirem
            let latitudeField = document.getElementById('latitude');
            let longitudeField = document.getElementById('longitude');

            if (latitudeField && longitudeField) {
                latitudeField.value = lat;
                longitudeField.value = lng;
            }

            // Se já houver um marcador, mova-o para a nova posição
            if (marker) {
                marker.setLatLng([lat, lng]);
            } else {
                // Caso contrário, adicione um novo marcador
                marker = L.marker([lat, lng]).addTo(map);
            }
        });

        return map;
    }

    // Chame initMap para inicializar o mapa pela primeira vez
    let map = initMap();

    // Reinicialize o mapa após cada atualização do Livewire
    document.addEventListener('livewire:update', function () {
        // Verifique se o mapa já existe e reinicialize se necessário
        if (window.L && document.getElementById('map')) {
            // Remova o mapa antigo antes de inicializar um novo
            map.remove();
            // Use setTimeout para garantir que o mapa seja inicializado após a atualização do DOM
            setTimeout(function() {
                map = initMap();
            }, 0);
        }
    });
});
