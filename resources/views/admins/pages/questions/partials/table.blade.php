 {{ $questions->links() }}
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>TITLE</th>
            <th>SHOW</th>
        </tr>
        </thead>
        <tbody>
        @forelse($questions as $question)
            <tr>
                <td>{{$question->id}}</td>
                <td>{{$question->title}}</td>
                <td>
                    <a class="btn btn-warning"
                       href="{{route('admin.questions.show', ['question' => $question])}}">
                        Show
                    </a>
                </td>
            </tr>
        @empty
            <div class="alert alert-warning">There is no {{$type}} questions!</div>
        @endforelse
        </tbody>
    </table>
    {{ $questions->links() }}

