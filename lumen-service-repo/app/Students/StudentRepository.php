<?php

namespace App\Repositories\Students;

use App\Repositories\Students\StudentRepositoryInterface;
use App\Models\Student;
use Symfony\Component\HttpKernel\Exception\HttpException;

class StudentRepository implements StudentRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function getAllStudents()
    {
        return Student::all();
    }

    /**
     * @inheritDoc
     */
    public function getStudentById(int $id): Student
    {
        $student = Student::find($id);

        // Throw exception
        if (!$student) {
            throw new HttpException(500, "Student with {$id} does not exist.");
        }

        return $student;
    }
}