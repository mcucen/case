<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Weekly Tasks</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="p-12">
    <div class="flex flex-col gap-8">
        @foreach($taskGroups as $key => $group)
            <div class="flex flex-row gap-4">
                <div class="p-2">
                    {{ $group->first()->developer->name }}
                </div>
                <div class="p-2">
                    {{ $developerEfforts[$key] }} Saat
                </div>
                <div class="flex flex-row gap-0.5 justify-center items-center">
                    @foreach($group as $task)
                        <div class="p-1 w-[{{ round(($task->complexity_score / $task->developer->rank) * 40) }}px] bg-black text-white text-sm">
                        {{ $task->id }}
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-4 p-2">
        Toplam hafta: <strong>{{ $weekCount }}</strong>
    </div>
</div>
</body>
</html>
