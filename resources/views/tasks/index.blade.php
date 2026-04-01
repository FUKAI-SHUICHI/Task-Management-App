<h1>タスク一覧</h1>

<ul id="task-list">
@foreach($tasks as $task)
    <li data-id="{{ $task->id }}">
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



<h2>タスク追加</h2>
@error('title')
<div style="color:red;">{{ $message }}</div>
@enderror
<form action="/tasks" method="POST">
    @csrf
    <input type="text" name="title" placeholder="タスク名">
    <input type="text" name="infomation" placeholder="詳細">
    <button type="submit">追加</button>
</form>


<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

<script>
const el = document.getElementById('task-list');

Sortable.create(el, {
    animation: 150,




</script>
