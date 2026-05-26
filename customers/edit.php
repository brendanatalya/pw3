<?php 
    include "functions.php"; 
    edit();
    include (HEADER_TEMPLATE);
?>

        <h2>Atualizando o Cliente <?php echo $customer['id']; ?></h2>
        <form action="edit.php?id=<?php echo $customer['id']; ?>" method="post">
            <hr />
            <div class="row">
                <div class="form-group col-md-7">
                    <label for="nome">Nome / Razão Social</label>
                    <input type="text" id="nome" class="form-control" name="customer['nome']" maxlength="80" value="<?php echo $customer['nome']; ?>" required>
                </div>

                <div class="form-group col-md-3">
                    <label for="cpf">CNPJ / CPF</label>
                    <input type="text" id="cpf" class="form-control" name="customer['cpf_cnpj']" maxlength="15" value="<?php echo $customer['cpf_cnpj']; ?>" required>
                </div>

                <div class="form-group col-md-2">
                    <label for="nasc">Data de Nascimento</label>
                    <input type="date"  id="nasc" class="form-control" name="customer['nasc']" value="<?php echo formatadata($customer['nasc'], "Y-m-d"); ?>" required>
                </div>
            </div>
            
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="endereco">Endereço</label>
                    <input type="text" id="endereco" class="form-control" name="customer['endereco']" maxlength="80" value="<?php echo $customer['endereco']; ?>" required>
                </div>

                <div class="form-group col-md-3">
                    <label for="bairro">Bairro</label>
                    <input type="text" id="bairro" class="form-control" name="customer['bairro']" maxlength="80" value="<?php echo $customer['bairro']; ?>" required>
                </div>
                
                <div class="form-group col-md-2">
                    <label for="cep">CEP</label>
                    <input type="text" id="cep" class="form-control" name="customer['cep']" maxlength="8" value="<?php echo $customer['cep']; ?>" required>
                </div>
                
                <div class="form-group col-md-2">
                    <label for="cad">Data de Cadastro</label>
                    <input type="date"  id="cad" class="form-control" name="customer['created']" disabled value="<?php echo formatadata($customer['created'], "Y-m-d"); ?>">
                </div>
            </div>
            
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="cidade">Município</label>
                    <input type="text"  id="cidade" class="form-control" name="customer['cidade']" maxlength="80" value="<?php echo $customer['cidade']; ?>" required>
                </div>
                
                <div class="form-group col-md-2">
                    <label for="telefone">Telefone</label>
                    <input type="tel"  id="telefone" class="form-control" name="customer['telefone']" maxlength="11" value="<?php echo $customer['telefone']; ?>" required>
                </div>
                
                <div class="form-group col-md-2">
                    <label for="celular">Celular</label>
                    <input type="tel"  id="celular" class="form-control" name="customer['celular']" maxlength="11" value="<?php echo $customer['celular']; ?>" required>
                </div>
                
                <div class="form-group col-md-1">
                    <label for="estado">UF</label>
                    <input type="text" id="estado"  class="form-control" name="customer['estado']" maxlength="2" value="<?php echo $customer['estado']; ?>" required>
                </div>
                
                <div class="form-group col-md-2">
                    <label for="ie">Inscrição Estadual</label>
                    <input type="text" id="ie" class="form-control" name="customer['ie']" maxlength="15" value="<?php echo $customer['ie']; ?>" required>
                </div>                
            </div>
            
            <div id="actions" class="row mt-2">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-info"><i class="fa-solid fa-user-check"></i> Salvar</button>
                    <a href="index.php" class="btn btn-dark"><i class="fa-solid fa-circle-xmark"></i> Cancelar</a>
                </div>
            </div>
        </form>

<?php include(FOOTER_TEMPLATE); ?>