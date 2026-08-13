<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use League\Uri\StringCoercionMode;

class ProyectoController extends Controller
{
    public function index() #muestra todos los proyectos
    {
        $valorUF = $this->calcularUF('2026-07-15'); #Simulación de obtener el valor de la UF
        $proyectos = Proyecto::all();

        return view('proyectos.index')
            ->with('proyectos', $proyectos) #se pasa la lista de proyectos a la vista
            ->with('valorUF', $valorUF);
    }

    public function create() #muestra el formulario para crear un nuevo proyecto
    {
        return view('proyectos.create');
    }

    public function store(Request $request) #guarda un nuevo proyecto en la base de datos
    {
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'fecha_inicio' => ['required', 'date'],
            'estado' => ['required', 'string', 'in:pendiente,en progreso,completado'],
            'responsable' => ['required', 'string', 'max:255'],
            'monto' => ['required', 'numeric', 'min:0'],
        ]);

        Proyecto::create([
            ...$validated,
            'created_by' => auth()->id(),
        ]);
        return redirect()->route('proyectos.index');
    }

    public function show(Proyecto $proyecto) #muestra un proyecto específico
    {
        return view('proyectos.show')
            ->with('proyecto', $proyecto); #se pasa el proyecto específico a la vista
    }

    public function edit(Proyecto $proyecto) #muestra el formulario para editar un proyecto específico
    {
        return view('proyectos.edit')
            ->with('proyecto', $proyecto); #se pasa el proyecto específico a la vista
    }

    public function update(Request $request, Proyecto $proyecto) #actualiza un proyecto específico con los datos enviados desde el formulario de edición
    {
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'fecha_inicio' => ['required', 'date'],
            'estado' => ['required', 'string', 'in:pendiente,en progreso,completado'],
            'responsable' => ['required', 'string', 'max:255'],
            'monto' => ['required', 'numeric', 'min:0'],
        ]);

        $proyecto->update($validated);

        return redirect()
            ->route('proyectos.show', $proyecto)
            ->with('success', 'Proyecto actualizado correctamente.');
    }

    public function destroy(Proyecto $proyecto) #elimina un proyecto específico de la base de datos
    {
        $proyecto->delete();
        return redirect()->route('proyectos.index');
    }

    function calcularUF(string $fecha): float #simula la obtención del valor de la UF para una fecha específica
    {
        #Valores de ejemplo por fechas
        $valoresUF = [
            '2026-07-01' => 38245.67,
            '2026-07-15' => 38312.40,
            '2026-08-01' => 38401.15,
        ];

        return $valoresUF[$fecha] ?? 0.0;
    }

    public function confirmarEliminar(Proyecto $proyecto)
    {
        return view('proyectos.delete')
            ->with('proyecto', $proyecto);
    }
}
