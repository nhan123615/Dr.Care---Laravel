<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Message;
use App\Models\Product;
use App\Models\Research;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class DrCareController extends Controller
{
    public function index() {
        return view('drcare.index');
    }

    public function about() {
        return view('drcare.about');
    }

    public function patientEducation($id) {
        return view('drcare.patient-education', ['id' => $id]);
    }

    public function relatedCourses() {
        return view('drcare.related-courses');
    }

    public function helpDocuments() {
        return view('drcare.help-documents');
    }

    public function facultyResources() {
        return view('drcare.faculty-resources');
    }

    public function studentResources() {
        return view('drcare.student-resources');
    }

    public function caseStudies() {
        return view('drcare.case-studies');
    }

    public function research() {
        $articles = DB::table('research')->orderBy('published_at', 'desc')->paginate(6);
        return view('drcare.research', ['articles' => $articles]);
    }

    public function researchArticle ($id) {
        return view('drcare.research-article', ['id' => $id]);
    }

    public function products($id) {
        return view('drcare.products', ['id' => $id]);
    }

    public function messagesCreate() {
        return view('drcare.messages-create');
    }

    public function messagesStore(Request $request) {
        Message::create($request->except('_token'));
        return Redirect::route('drcare-messages-create', ['message' => 'Message Sent!']);
    }

    public function appointmentsCreate() {
        return view('drcare.appointments-create');
    }

    public function appointmentsStore(Request $request) {
        $appointment = new Appointment();
        $appointment->first_name = $request->get('first_name');
        $appointment->last_name = $request->get('last_name');
        $appointment->setServiceTypeId($request->get('service_type_id'));
        $appointment->phone = $request->get('phone');
        $appointment->setDate($request->get('date'));
        $appointment->setTime($request->get('time'));
        $appointment->message = $request->get('message');
        $appointment->save();
        return Redirect::route('drcare-appointments-create');
    }

    public function doctors() {
        $doctors = Doctor::all();
        return view('drcare.doctors', ['doctors' => $doctors]);
    }
}
