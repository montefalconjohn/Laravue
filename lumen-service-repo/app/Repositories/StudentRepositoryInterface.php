<?php

namespace App\Repositories\Students;

use App\Models\Student;

interface StudentRepositoryInterface
{
    /**
     * Fetches all the students
     * 
     */
    public function getAllStudents();

    /**
     * Fetch a certain student by Id
     * 
     * @return Student
     */
    public function getStudentById(int $id): Student;
}