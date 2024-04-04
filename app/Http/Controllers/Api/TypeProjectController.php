<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class TypeProjectController extends Controller
{
    //
    public function __invoke(string $id)
    {
        $type = Type::find($id);
        if (!$type) return response(null, 404);

        $type->load('projects.type', 'projects.technologies');
        $projects = $type->projects;

        return response()->json(['projects' => $projects, 'label' => $type->label]);
    }
    // public function __invoke(string $id)
    // {
    //     $type = Type::find($id);
    //     if (!$type) {
    //         return response()->json(['error' => 'Tipo non trovato'], 404);
    //     }

    //     // Carica i progetti associati al tipo
    //     $projects = $type->projects()->with('technologies')->get();

    //     return response()->json(['projects' => $projects, 'label' => $type->label]);
    // }
}
