@include('admin.includes.alerts')

<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{ $material->name ?? old('name') }}">
</div>

<div class="form-group">
    <label>Pontos:</label>
    <input type="text" name="volume" class="form-control" placeholder="Pontos por peso (kilos):" value="{{ $material->volume ?? old('volume') }}">
</div>
<div class="form-group">
    <label>Valor do ponto:</label>
    <input type="text" name="point" class="form-control" placeholder="Valor do ponto:" value="{{ $material->point ?? old('point') }}">
</div>
<div class="form-group">
    <label>Validade:</label>
    <input type="text" name="shelf_life" class="form-control" placeholder="Validade em meses:" value="{{ $material->shelf_life ?? old('shelf_life') }}">
</div>

<div class="form-group">
    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Enviar</button>
</div>
