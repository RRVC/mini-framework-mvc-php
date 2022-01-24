{% extends 'partials/body.twig.php' %}

{% block title %} Novo Produto - Mini Framework {% endblock %}

{% block body%}

<div class="max-width center-screen bg-white padding">
    <h1>Novo Produto</h1>

    <form action="{{BASE}}insert-produto" method="POST">

    <div class="mt-3">
        <label for="txtTitulo">Nome do Produto</label>
        <input type="text" id="txtTitulo" name="txtTitulo" class="form-control" placeholder="Placa de Vídeo" required>
    </div>

    <div class="mt-3">
        <label for="txtImagem">Imagem</label>
        <input type="text" id="txtImagem" name="txtImagem" class="form-control" placeholder="URL da Imagem">
    </div>

    <div class="mt-3">
        <label for="txtDescricao">Descrição do Produto</label>
        <textarea type="text" id="txtDescricao" name="txtDescricao" class="form-control" placeholder="Descrição do Produto" rows="5" required></textarea>
    </div>

    <div class="mt-3 text-end">
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>

    </form>

</div>

{% endblock %}