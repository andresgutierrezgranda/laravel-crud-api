<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class studentController extends Controller
{
    /**
     * Muestra una lista de los estudiantes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtiene todos los estudiantes de la base de datos
        $students = Student::all();

        

        // Si hay estudiantes, devuelve una respuesta 200 con los datos de los estudiantes
        $data = [
            'message' => $students,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    /**
     * Almacena un nuevo estudiante en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valida los datos del request
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:student',
            'phone'    => 'required|digits:9',
            'language' => 'required|in:English,Spanish,French'
        ]);

        // Si la validación falla, devuelve una respuesta 400 con los errores
        if($validator->fails()){
            $data = [
                'message' => 'Error de validación',
                'errors' => $validator->errors(),
                'status' => 400
            ];

            return response()->json($data, 400);
        }

        // Crea un nuevo estudiante con los datos del request
        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'language' => $request->language
        ]);

        // Si el estudiante no se pudo crear, devuelve una respuesta 500 con un mensaje de error
        if (!$student) {
            $data = [
                'message' => 'Error al guardar el estudiante',
                'status' => 500
            ];

            return response()->json($data, 500);
            
        }

        // Si el estudiante se pudo crear, devuelve una respuesta 201 con los datos del estudiante
        $data = [
            'student' => $student,
            'status' => 201
        ];

        return response()->json($data, 201);
    }

    /**
     * Muestra un estudiante específico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        // Encuentra el estudiante con el id dado
        $student = Student::find($id);

        // Si el estudiante no se encuentra, devuelve una respuesta 404 con un mensaje de error
        if(!$student){
            $data = [
                'message' => 'Estudiante no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        // Si el estudiante se encuentra, devuelve una respuesta 200 con los datos del estudiante
        $data = [
            'student' => $student,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    /**
     * Elimina un estudiante específico de la base de datos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Encuentra el estudiante con el id dado
        $student = Student::find($id);  

        // Si el estudiante no se encuentra, devuelve una respuesta 404 con un mensaje de error
        if(!$student){
            $data = [
                'message' => 'Estudiante no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        // Elimina el estudiante
        $student->delete();

        // Devuelve una respuesta 200 con un mensaje de éxito
        $data = [
            'message' => 'Estudiante eliminado',
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    /**
     * Actualiza un estudiante específico en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Valida los datos del request
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:student,email,'.$id,
            'phone'    => 'required|digits:9',
            'language' => 'required|in:English,Spanish,French'
        ]);

        // Si la validación falla, devuelve una respuesta 400 con los errores
        if($validator->fails()){
            $data = [
                'message' => 'Error de validación',
                'errors' => $validator->errors(),
                'status' => 400
            ];

            return response()->json($data, 400);
        }

        // Encuentra el estudiante con el id dado
        $student = Student::find($id);

        // Si el estudiante no se encuentra, devuelve una respuesta 404 con un mensaje de error
        if(!$student){
            $data = [
                'message' => 'Estudiante no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        // Actualiza el estudiante con los datos del request
        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'language' => $request->language
        ]);

        // Si el estudiante no se pudo actualizar, devuelve una respuesta 500 con un mensaje de error
        if (!$student) {
            $data = [
                'message' => 'Error al actualizar el estudiante',
                'status' => 500
            ];

            return response()->json($data, 500);
            
        }

        // Si el estudiante se pudo actualizar, devuelve una respuesta 200 con los datos del estudiante
        $data = [
            'student' => $student,
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}