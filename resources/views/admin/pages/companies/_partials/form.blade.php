@include('admin.includes.alerts')

<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{ $company->name ?? old('name') }}">
</div>
<div class="form-group">
    <label>Responsável:</label>
    <input type="text" name="responsible" class="form-control" placeholder="Responsável:" value="{{ $company->responsible ?? old('responsible') }}">
</div>
<div class="form-group">
    <label>E-mail:</label>
    <input type="email" name="email" class="form-control" placeholder="Nome:" value="{{ $company->email ?? old('email') }}">
</div>
<div class="form-group">
    <label>CEP:</label>
    <input type="text" name="zipcode" class="form-control" placeholder="CEP:" value="{{ $company->zipcode ?? old('zipcode') }}">
</div>
<div class="form-group">
    <label>Rua:</label>
    <input type="text" name="street" class="form-control" placeholder="Rua:" value="{{ $company->street ?? old('street') }}">
</div>
<div class="form-group">
    <label>Número:</label>
    <input type="text" name="number" class="form-control" placeholder="Número:" value="{{ $company->number ?? old('number') }}">
</div>
<div class="form-group">
    <label>Complemento:</label>
    <input type="text" name="complement" class="form-control" placeholder="Complemento:" value="{{ $company->complement ?? old('complement') }}">
</div>
<div class="form-group">
    <label>Bairro:</label>
    <input type="text" name="neighborhood" class="form-control" placeholder="Bairro:" value="{{ $company->neighborhood ?? old('neighborhood') }}">
</div>
<div class="form-group">
    <label>Estado:</label>
    <input type="text" name="state" class="form-control" placeholder="Estado:" value="{{ $company->state ?? old('state') }}">
</div>
<div class="form-group">
    <label>Cidade:</label>
    <input type="text" name="city" class="form-control" placeholder="Cidade:" value="{{ $company->city ?? old('city') }}">
</div>
<div class="form-group">
    <label>Contato:</label>
    <input type="text" name="cell" class="form-control" placeholder="Celular:" value="{{ $company->cell ?? old('cell') }}">
</div>
<div class="form-group">
    <label>Valor:</label>
    <input type="text" name="valor" class="form-control" placeholder="Valor por ponto:" value="{{ $company->valor ?? old('valor') }}">
</div>
<div class="form-group">
    <label>Limite:</label>
    <input type="text" name="limit" class="form-control" placeholder="Limite:" value="{{ $company->limit ?? old('limit') }}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Enviar</button>
</div>
