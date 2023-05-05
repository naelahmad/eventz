<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::all();
        return view('admin.dashboard.faqs.index', ['faqs' => $faqs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->rules(), [
            'question.required' => 'A question is required',
            'answer.required' => 'A answer is required',
        ]);
        // $faq = new Faq();
        // $faq->question = $request->question;
        // $faq->answer = $request->answer;
        // $faq->save();
        $faqs = Faq::create($request->all());
        return redirect()->route('faqs.index')->with('success', 'FAQ Addedd Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        return view('admin.dashboard.faqs.edit', [['faq' => $faq]]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)

    {
        $request->validate($this->rules(), [
            'question.required' => 'A question is required',
            'answer.required' => 'A answer is required',
        ]);
        $faq->update($request->all());
        return redirect()->route('faqs.index')->with('success', 'FAQ Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('faqs.index')->with('success', 'FAQ Deleted Sucessfully');
    }

    public function rules()
    {
        return [
            'question' => 'required|min:3|max:255',
            'answer' => 'required'
        ];
    }
}
