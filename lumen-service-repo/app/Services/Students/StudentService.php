<?php

namespace App\Services\Students;

use App\Services\Students\StudentServiceInterface;
use App\Repositories\Students\StudentRepositoryInterface;
use App\Models\Student;
use App\Http\Requests\StudentsRequest;
use Symfony\Component\HttpKernel\Exception\HttpException;

class StudentService implements StudentServiceInterface
{

    /** @var StudentRepositoryInterface */
    private $studentRepository;

    /**
     * StudentService constructor.
     * 
     * @param StudentRepositoryInterface $studentRepository
     */
    public function __construct(StudentRepositoryInterface $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

     /**
     * @inheritDoc
     */
    public function fetchStudents()
    {
        return $this->studentRepository->getAllStudents();
    }

    /**
     * @inheritDoc
     */
    public function fetchStudentByStudentId(int $id): Student
    {
        return $this->studentRepository->getStudentById($id);
    }

    /**
     * @inheritDoc
     */
    public function createStudent($request): Student
    {
        return Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'gender'=> $request->gender
        ]);
    }

    /**
     * @inheritDoc
     */
    public function updateStudent($request, int $id): void
    {
        $student = $this->studentRepository->getStudentById($id);

        $student->fill($request->input())->save();
    }

    /**
     * @inheritDoc
     */
    public function deleteStudent(int $id): void
    {
        $student = $this->studentRepository->getStudentById($id);

        $student->delete();
    }
}