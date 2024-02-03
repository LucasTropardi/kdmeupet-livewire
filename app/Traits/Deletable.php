<?php

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait Deletable
{
    public function deleteRegistro(Model $model): array
    {
        try {
            $model->delete();
            return ['success' => true, 'message' => 'Registro excluído com sucesso!'];
        } catch (\Exception $e) {
            return ['success' => false, 'message' => 'Erro ao excluir registro: ' . $e->getMessage()];
        }
    }
}
