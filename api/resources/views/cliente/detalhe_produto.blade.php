@extends('layouts.layout')



@section('content')

<div class="col-md-6 container " style=''>
    @if (session('success'))
        <div class="alert alert-success">
                {{ session('success') }}
            </div>
    @endif
    @if (session('falha'))
        <div class="alert alert-danger">
                {{ session('falha') }}
            </div>
    @endif
            <div class="thumbnail " >
                <canvas style="width: 100%; height: 100%;"  id="renderCanvas" title="Visualizacao de exemplo"></canvas>
                <h4 class="col-md-12 col-12 shadow-lg text-light bg-dark" style="">{{$produto->nome}}</h4>
                <div class="row">
                    <p class="col-md-12 col-12 ">{{$produto->descricao}}</p>
                </div>
            </div>
            <div class='produto-content'>
            <div class='produto-meta float-right'>

            </div>
            </div>

            <a href="/fazer_pedido/{{$produto->id}}" class="btn btn-success text-light pulse col-md-5 col-12">Fazer Pedido</a>

        <a href="/" class="btn btn-outline-dark m-5 col-md-5 float-left fixed-bottom">Home</a>
        </div>
@endsection
@section('js')
<style>
.pulse{
    animation: pulse 3s ;
}
@keyframes pulse {
    0% {
        transform: scale(0.95);
        box-shadow: 0 0 0 0 rgba(0, 2, 0, 0.7);
        filter: brightness(1.1);

    }
    70% {
        transform: scale(0.20);
        box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.7);
        filter: brightness(2);

    }
    100% {
        transform: scale(0.95);
        filter: brightness(0.9);

    }
}
</style>
<script src="/js/babylon.js"></script>
<script src="/js/babylonjs.loaders.js"></script>
<script type="text/javascript">
window.onload = function () {
    var canvas = document.getElementById("renderCanvas");

    function delayCreateScene() {
    var scene = new BABYLON.Scene(engine);
            // Parameters: alpha, beta, radius, target position, scene
        var camera = new BABYLON.ArcRotateCamera("Camera", 0, 0, 10, new BABYLON.Vector3(0, 0, 0), scene);
        // Positions the camera overwriting alpha, beta, radius
        camera.setPosition(new BABYLON.Vector3(1, 1, 1));
        // This attaches the camera to the canvas
        camera.attachControl(canvas);
    // Load the model
    BABYLON.SceneLoader.ImportMesh("", "/scenes/", "cadeira-verde.obj", scene, function (meshes) {
            scene.createDefaultCameraOrLight(5, true, true);
            scene.createDefaultEnvironment();

            if (id) {
        var meshesadmin =  scene.getMeshByID(id);
        meshesadmin.material.diffuseColor = BABYLON.Color3.Red();
        }
    });

    var selected = null;


    scene.onPointerObservable.add(function(evt){


    }, BABYLON.PointerEventTypes.POINTERUP);

        return scene;

    }

    var engine = new BABYLON.Engine(canvas, true, { preserveDrawingBuffer: true, stencil: true });
    var scene = delayCreateScene();

    engine.runRenderLoop(function () {
        if (scene) {
            scene.render();

        }
    });
    // Resize
    window.addEventListener("resize", function () {
        engine.resize();
    });

}
</script>
@endsection
