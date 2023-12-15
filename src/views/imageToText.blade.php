{{-- {{ do_action('scripts-msz')}} --}}
<h1 class="text-3xl font-bold underline bg-red-400">
    Strona do konfiguracji vite
</h2>

<div class="test">
</div>

<p class="bg-green-500 text-5xl">
    tu jakis testowy paragraf 222333
</p>

<div class="test2">
</div>

{{-- {{ show("FM_PATH: ". FM_PATH) }}
{{ show("FM_URI: ". FM_URI) }}
{{ show("FM_ASSETS_PATH: ". FM_ASSETS_PATH) }}
{{ show("FM_ASSETS_URI: ". FM_ASSETS_URI) }}
{{ show("FM_RESOURCES_PATH: ". FM_RESOURCES_PATH) }}
{{ show("FM_RESOURCES_URI: ". FM_RESOURCES_URI) }} --}}
{{ show(resolve("images/screenshot.png")) }}

<img src="<?php echo resolve("images/screenshot.png") ?>" width="400" height="500" alt="Image" class="logo"/>
