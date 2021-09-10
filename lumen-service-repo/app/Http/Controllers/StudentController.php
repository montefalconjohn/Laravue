<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Students\StudentServiceInterface;
use App\Http\Resources\StudentsResource;
use App\Http\Requests\StudentsRequest;
use App\Models\Student;

class StudentController extends Controller
{
      /** @var StudentServiceInterface */
      private $studentService;

      /**
       * StudentController constructor.
       * 
       * @param StudentServiceInterface $studentService
       */
      public function __construct(StudentServiceInterface $studentService)
      {
          $this->studentService = $studentService;
      }
  
      /**
       * Display a listing of the resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function index()
      {
          return StudentsResource::collection($this->studentService->fetchStudents());
      }
  
      /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function create()
      {
          //
      }
  
       /**
       * Store a newly created resource in storage.
       * 
       * @param \Illuminate\Http\Request $request
       * @return \Illuminate\Http\Response
       */
      public function store(StudentsRequest $request)
      {
          // It automatically checks the validation
          // $request->validated();
  
          return new StudentsResource($this->studentService->createStudent($request));
      }
  
      /**
       * Display the specified resource.
       *
       * @param int $id
       * @return \Illuminate\Http\Response
       */
      public function show(int $id)
      {
          return new StudentsResource($this->studentService->fetchStudentByStudentId($id));
      }
  
      /**
       * Show the form for editing the specified resource.
       *
       * @param  \App\Models\Student  $student
       * @return \Illuminate\Http\Response
       */
      public function edit(Student $student)
      {
          //
      }
  
      /**
       * Update the specified resource in storage.
       *
       * @param \Illuminate\Http\Request  $request
       * @param int $id
       * @return \Illuminate\Http\Response
       */
      public function update(StudentsRequest $request, int $id)
      {
          $this->studentService->updateStudent($request, $id);
  
          return response()->json('Student successfully updated.');
      }
  
      /**
       * Remove the specified resource from storage.
       *
       * @param  int $id
       * @return \Illuminate\Http\Response
       */
      public function destroy(int $id)
      {
          $this->studentService->deleteStudent($id);
          
          return response()->json('Student successfully deleted.');
      }
}
