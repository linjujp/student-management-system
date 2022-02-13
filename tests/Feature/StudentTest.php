<?php

/**
 * @author    Linju Jayaprakash <linjujp@gmail.com>
 * @license   @linju
 * @copyright 2022, Linju Jayaprakash
 * 
 */

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Schema;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\StudentMark;

class StudentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    use DatabaseTransactions;

    /** @test student table columns */
    public function student_database_has_expected_columns()
    {
        $this->assertTrue(Schema::hasColumns('students', [
            'id',
            'name', 
            'age', 
            'gender',
            'teacher_id',
        ]), 1);
    }

    /** @test student creation */
    public function testStudentCreation()
    {
        $teacher = Teacher::factory()->create();
        Student::factory()->create([
            'name' => 'Kevin',
            'age' => 12,
            'gender' => 'M',
            'teacher_id' =>$teacher->id,
        ]);
        $this->assertDatabaseHas('students', [
            'name' => 'Kevin',
            'age' => 12,
            'gender' => 'M',
            'teacher_id' =>$teacher->id
    ]);
    }

    /** @test student mark table columns */
    public function student_mark_database_has_expected_columns()
    {
        $this->assertTrue(Schema::hasColumns('student_marks', [
            'id',
            'maths', 
            'history', 
            'science',
            'term',
        ]), 1);
    }

    /** @test mark creation */
    public function testMarkCreation()
    {
        $student = Student::factory()->create();
        StudentMark::factory()->create([
            'maths' => 45,
            'history' => 12,
            'science' => 34,
            'term' => 'One',
            'student_id' => $student->id,
        ]);
        $this->assertDatabaseHas('student_marks', [
            'maths' => 45,
            'history' => 12,
            'science' => 34,
            'term' => 'One',
            'student_id' => $student->id,
    ]);
    }
}
