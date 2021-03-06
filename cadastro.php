<script type="text/javascript" src="assets/js/angular.min.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/controller.js"></script>
<script type="text/javascript" src="assets/js/jquery.mask.min.js"></script>
<!-- Formulario de cadastro dos alunos -->
<form novalidate
      name="cadastroForm"
      ng-submit="vm.save(vm.customer)">

    <div class="form-group"
         ng-class="{ 'has-error' : cadastroForm.nome.$invalid && !cadastroForm.nome.$pristine }">
        <label>Nome</label>
        <input name="nome"
               type="text"
               id="nome"
               class="form-control"
               placeholder="Digite seu nome..."
               required
               ng-minlength="3"
               ng-model="vm.customer.nome">
        <p ng-show="cadastroForm.nome.$error.minlength"
           class="help-block">
            Nome com o mínimo de 3 caracteres!
        </p>
    </div>

    <div class="form-group"
         ng-class="{ 'has-error' : cadastroForm.cpf.$invalid && !cadastroForm.cpf.$pristine }">
        <label>CPF</label>
        <input type="text"
               name="cpf"
               id="cpf"
               class="form-control"
               placeholder="Digite seu CPF..."
               required
               ng-model="vm.customer.cpf"
               data-mask="000.000.000-00"
               data-mask-selectonfocus="true"
               ng-pattern="/^[0-9]{1,7}[-\.\/]?+$/">
    </div>

    <div class="form-group"
         ng-class="{ 'has-error' : cadastroForm.idade.$invalid && !cadastroForm.idade.$pristine }">
        <label>Idade</label>
        <input type="number"
               name="idade"
               id="idade"
               class="form-control"
               placeholder="Digite sua idade"
               required
               ng-model="vm.customer.idade"
               ng-minlength="1"
               ng-maxlength="2">
        <p ng-show="cadastroForm.idade.$error.minlength"
           class="help-block">
            Digite sua idade!
        </p>
        <p ng-show="cadastroForm.idade.$error.maxlength"
           class="help-block">
            Máximo 2 numeros!
        </p>
    </div>

    <button type="button"
            ng-disabled="cadastroForm.$invalid"
            class="btn btn-primary"
            id="botao">
        Cadastrar Aluno
    </button>

</form>
