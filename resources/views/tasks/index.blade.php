<h1>タスク一覧</h1>

<ul>
@foreach($tasks as $task)
    <li>
        <strong>{{ $task->title }}</strong><br>
        詳細:{{ $task->infomation }}<br>

        進行度:<form action="/tasks/{{ $task->id }}" method="POST" style="display:inline; margin-left:5px;">
                @csrf
                @method('PATCH')

                <select name="status" onchange="this.form.submit()">
                    <option value="0" {{ $task->status == 0 ? 'selected' : '' }}>未実行</option>
                    <option value="1" {{ $task->status == 1 ? 'selected' : '' }}>進行中</option>
                    <option value="2" {{ $task->status == 2 ? 'selected' : '' }}>完了</option>
                </select>
            </form>
    </li>
@endforeach
</ul>

<h2>タスク追加<h2>

<form action="/tasks" method="POST">
    @csrf
    <input type="text" name="title" placeholder="タスク名">
    <input type="text" name="infomation" placeholder="詳細">
    <button type="submit">追加</button>
</form>