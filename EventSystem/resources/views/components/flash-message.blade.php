@if (session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(()=>show=false,3000)" x-show="show" class="flash-message"
        style="
            position: fixed;top: 10px;
            right: 10px;
            padding: 10px 40px;
            background-color: skyblue;
            color: rgb(255, 255, 255);">
        <p style="margin:0">
            {{session('message')}}
        </p>
    </div>
@endif