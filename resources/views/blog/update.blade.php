@extends('layout')
 
@section('title', 'Update Blog')

@section('content')
<section class="bg-gray-50 dark:bg-gray-900">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
          <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
          Flowbite    
      </a>
      <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                  Update Blog
              </h1>
              <form class="space-y-4 md:space-y-6" action="{{ route('blog.update.submit', $blog) }}" method="POST">
                @method('PUT')
                @csrf
                  <div>
                      <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Blog Title</label>
                      <input type="title" name="title" id="title" 
                      class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('title') is-invalid @enderror" placeholder="Your blog title" value="{{ old('title') ?? $blog->title }}">
                      @error('title')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                  </div>
                  <div>
                      <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Blog Content</label>
                      <textarea id="content" name="content" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('content') is-invalid @enderror" placeholder="Write your blog's content here" value="{{ old('content') ?? $blog->content }}">{{ old('content') ?? $blog->content }}</textarea>
                      @error('content')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                  </div>
                  <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Update Blog</button>
              </form>
              <button onclick="location.href='{{ route('blog.view') }}'" class="w-full text-gray bg-white-600 hover:bg-white-700 focus:ring-4 focus:outline-none rounded-lg border border-gray-200 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-white-600 dark:hover:bg-white-700 dark:focus:ring-gray-800">Cancel</button>
          </div>
      </div>
  </div>
</section>
@endsection