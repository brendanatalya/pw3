//Passa os dados do cliente para o Modal, e atualiza o link para exclusão

//procura o elemento que tem esse id o class aplicado, .(com) esse eventinho ai, vai disaparar a outra função
$("#delete-modal").on("show.bs.modal", function (event) {   
    
    var button = $(event.relatedTarget); //pega o related target e (nesse contetxo, o botao excluir)
    var id = button.data("customer");

    var modal = $(this);
    modal.find(".modal-title").text("Excluir Cliente : " + id); 
    modal.find(".modal-body").text("Deseja mesmo excluir o cliente " + id + "?"); 
    modal.find("#confirm").attr("href", "delete.php?id=" + id); //aqui ta trocando o valor de um atributo(href)
});

$("#modalmedico").on("show.bs.modal", function (event) {   
    var button = $(event.relatedTarget);
    var id = button.data("customer");

    var modal = $(this);
    modal.find(".modal-title").text("Excluir Médico : " + id); 
    modal.find(".modal-body").text("Deseja mesmo excluir o medico " + id + "?"); 
    modal.find("#confirma").attr("href", "delete.php?id=" + id);
});

$("#modalrevista").on("show.bs.modal", function (event) {   
    var button = $(event.relatedTarget);
    var id = button.data("customer");

    var modal = $(this);
    modal.find(".modal-title").text("Excluir Revista : " + id); 
    modal.find(".modal-body").text("Deseja mesmo excluir a revista " + id + "?"); 
    modal.find("#confirma").attr("href", "delete.php?id=" + id);
});
//do usuariuo ne bb
$("#delete-usuario").on("show.bs.modal", function (event) {   
    var button = $(event.relatedTarget);
    var id = button.data("customer");

    var modal = $(this);
    modal.find(".modal-title").text("Excluir Usuario : " + id); 
    modal.find(".modal-body").text("Deseja mesmo excluir o usuario " + id + "?"); 
    modal.find("#confirm").attr("href", "delete.php?id=" + id);
});