<!DOCTYPE html>
<html>
<head>
    <script
        src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v1.9.8/dist/alpine.js"
        defer
        ></script>
</head>
<body>
<h1>First Alpine Js Work</h1>
<div x-data="{ isOpen: true }">
    <button @click=" isOpen = !isOpen">Toggle</button>
    <h1 x-show="isOpen">index.html</h1>
</div>
<button
    class="bg-blue-700 text-white px-4 py-3 mt-4 text-sm rounded"
@click="isOpen = false"
x-ref="modalCloseButton"
></button>
<button
    class="bg-blue-700 text-white px-4 py-3 mt-4 text-sm rounded"
@click="isOpen = true
$nextTick(() => $refs.modalCloseButton.focus())
"
></button>

</body>
</html>