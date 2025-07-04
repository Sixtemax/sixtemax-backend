<?php



namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tercero;
use Illuminate\Http\Request;

class TerceroController extends Controller
{
    public function index()
    {
        return response()->json(Tercero::all());
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'tipo_documento' => 'nullable|string',
        'documento' => 'required|string|unique:terceros,documento',
        'nombre' => 'required|string|max:255',
        'telefono' => 'nullable|string|max:50',
        'email' => 'nullable|email|max:100',
        'direccion' => 'nullable|string|max:255',
        'ciudad' => 'nullable|string|max:100',
        'tipo' => 'required|in:cliente,proveedor,ambos',
        'activo' => 'boolean',
    ]);

    // Asignar empresa_id por defecto mientras no hay login
    $validated['empresa_id'] = 1;

    $tercero = Tercero::create($validated);

    return response()->json(['success' => true, 'data' => $tercero]);
}
    public function update(Request $request, $id)
    {
        $tercero = Tercero::findOrFail($id);

        $validated = $request->validate([
            'tipo_documento' => 'nullable|string',
            'documento' => 'required|unique:terceros,documento,' . $id,
            'nombre' => 'required|string',
            'telefono' => 'nullable|string',
            'email' => 'nullable|email',
            'direccion' => 'nullable|string',
            'ciudad' => 'nullable|string',
            'tipo' => 'required|in:cliente,proveedor,ambos',
        ]);

        $tercero->update($validated);

        return response()->json($tercero);
    }

    public function destroy($id)
    {
        $tercero = Tercero::findOrFail($id);
        $tercero->delete();

        return response()->json(['message' => 'Eliminado correctamente']);
    }
}
