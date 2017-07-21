<form novalidate
      name="customerForm"
      ng-submit="vm.save(vm.customer)">

    <div class="form-group"
         ng-class="{ 'has-error' : customerForm.name.$invalid && !customerForm.name.$pristine }">
        <label>Nome</label>
        <input name="name"
               type="text"
               class="form-control"
               placeholder="Digite seu nome..."
               required
               ng-minlength="3"
               ng-model="vm.customer.name">
        <p ng-show="customerForm.name.$error.minlength"
           class="help-block">
            Nome com o mínimo de 3 caracteres!
        </p>
    </div>

    <div class="form-group"
         ng-class="{ 'has-error' : customerForm.email.$invalid && !customerForm.email.$pristine }">
        <label>CPF</label>
        <input type="text"
               name="cpf"
               class="form-control"
               placeholder="Digite seu CPF..."
               required
               ng-model="vm.customer.cpf"
               ui-mask="999.999.999-99"
               ng-pattern="/^[0-9]{1,7}[-\.\/]?+$/">
    </div>

    <div class="form-group"
         ng-class="{ 'has-error' : customerForm.password.$invalid && !customerForm.password.$pristine }">
        <label>Idade</label>
        <input type="number"
               name="idade"
               class="form-control"
               placeholder="Digite sua idade"
               required
               ng-model="vm.customer.idade"
               ng-minlength="1"
               ng-maxlength="3">
        <p ng-show="customerForm.idade.$error.minlength"
           class="help-block">
            Digite sua idade!
        </p>
        <p ng-show="customerForm.idade.$error.maxlength"
           class="help-block">
            Máximo 3 numeros!
        </p>
    </div>

    <button type="submit"
            ng-disabled="customerForm.$invalid"
            class="btn btn-primary">
        Submit
    </button>

</form>
