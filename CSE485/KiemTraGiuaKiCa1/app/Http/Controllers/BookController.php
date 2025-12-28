<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Hiển thị danh sách sách.
     */
    public function index()
    {
        $books = Book::with('member')->paginate(5); // load quan hệ member
        return view('books.index', compact('books'));
    }

    /**
     * Hiển thị form tạo sách mới.
     */
    public function create()
    {
        $members = Member::all(); // để chọn member khi thêm sách
        return view('books.create', compact('members'));
    }

    /**
     * Lưu sách mới vào database.
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:100',
            'isbn' => 'nullable|string|max:20|unique:books,isbn',
            'publication_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'copies_available' => 'nullable|integer|min:0',
        ]);

        Book::create([
            'member_id' => $request->member_id,
            'title' => $request->title,
            'author' => $request->author,
            'isbn' => $request->isbn,
            'publication_year' => $request->publication_year,
            'copies_available' => $request->copies_available ?? 0,
        ]);

        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    }

    /**
     * Hiển thị chi tiết sách.
     */
    public function show(Book $book)
    {
    }

    /**
     * Hiển thị form sửa sách.
     */
    public function edit(Book $book)
    {
        $members = Member::all(); // để chọn member khi sửa
        return view('books.edit', compact('book', 'members'));
    }

    /**
     * Cập nhật thông tin sách.
     */
    public function update(Request $request, Book $book)
    {
        // Validation
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:100',
            'isbn' => 'nullable|string|max:20|unique:books,isbn,' . $book->id,
            'publication_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'copies_available' => 'nullable|integer|min:0',
        ]);

        $book->update([
            'member_id' => $request->member_id,
            'title' => $request->title,
            'author' => $request->author,
            'isbn' => $request->isbn,
            'publication_year' => $request->publication_year,
            'copies_available' => $request->copies_available ?? 0,
        ]);

        return redirect()->route('books.index')->with('success', 'Book updated successfully');
    }

    /**
     * Xóa sách.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    }
}
