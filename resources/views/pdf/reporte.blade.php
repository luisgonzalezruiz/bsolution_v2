<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Reporte de Categorias</h1>
    <div class="table-responsive">
        <table class="table table-sm table-centered table-nowrap mb-0">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Descripcion</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td class="text-body fw-bold">
                            {{ $category->id }}
                        </td>
                        <td>
                            {{ $category->name }}
                        </td>
                        <td class="table-user">
                            <span>
                                <img src="{{Storage::url($category->imagen)}}"
                                    alt="imagen de ejemplo" class="me-2 rounded-circle">
                            </span>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</body>
</html>
