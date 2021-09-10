<?php

namespace App\Services\Students;

use App\Models\Student;
use App\Http\Requests\StudentsRequest;

interface StudentServiceInterface
{
    /**
     * Fetches all students
     */
    public function fetchStudents();

    /**
     * Fetches a specific student by id
     * 
     * @param int $id
     * @return Student
     */
    public function fetchStudentByStudentId(int $id): Student;

    /**
     * Create a student
     * 
     * @param 
     */
    public function createStudent($request): Student;

    /**
     * Update a specific student
     * 
     * @param request
     * @param int $id
     * @return void
     */
    public function updateStudent($request, int $id): void;

    /**
     * Delete a specific student
     * 
     * @param int $id
     * @return void
     */
    public function deleteStudent(int $id): void;
}