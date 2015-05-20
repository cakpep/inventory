

jQuery(document).pjax(
    "#cp-bckend-link a", 
    "#cp-bckend-content", {  
            "push":true,
            "replace":false,
            "timeout":30000,
            "scrollTo":false,            
        });

// jQuery('#w0').yiiGridView('setSelectionColumn', {"name":"selection[]","multiple":true,"checkAll":"selection_all"});

// $('#pjax-loader').fadeOut(1000);

$(document).on('pjax:send', function() {
  $('#pjax-loader').show()
})

$(document).on('pjax:complete', function() {
  $('#pjax-loader').hide()
})

$(document).on('pjax:complete', function() {
  // alert('oke');
  // $("#animasi").delay(1000).fadeIn();
  

$('.alert-success').css({
                    "position": "absolute",
                    "right": "15px",
                    "bottom": "50px",
                    "z-index": 10050,
                  }); 
$('.alert-success').fadeOut(5000)


$('.alert-warning').css({
                    "position": "absolute",
                    "right": "15px",
                    "bottom": "50px",
                    "z-index": 10050,
                  });  

$('.alert-warning').fadeOut(5000)


$('.alert-info').css({
                    "position": "absolute",
                    "right": "15px",
                    "bottom": "50px",
                    "z-index": 10050,
                  }); 
$('.alert-info').fadeOut(5000)


$('.alert-danger').css({
                    "position": "absolute",
                    "right": "15px",
                    "bottom": "50px",
                    "z-index": 10050,
                  }); 
$('.alert-danger').fadeOut(5000)



  $('#pjax-loader').fadeIn("slow")
  $('#pjax-loader').fadeOut("slow")

  $('#contents').fadeIn("slow")

  $('.breadcrumb').css({ 'display': 'none' })    
  $('.breadcrumb').attr('class', 'breadcrumb animateds fadeInDowns');
  $('.breadcrumb').fadeIn(2000);

  $('#pjax-isi').css({ 'display': 'none' })    
  $('#pjax-isi').attr('class', 'container animateds fadeInLefts');
  $('#pjax-isi').fadeIn(2000);
  

});

/*

$('body').on('click', 'a#delete', function (event){
    var link = $(this)    
    var href = link.attr("href");

    yii.confirm = function (message, ok, cancel) {
        if (confirm(message)) {
            //!ok || ok();
            $.ajax({
                url: href,
                type: "post",
                success: function(data) {
                    if(data.success==true){
                        // $("#pjax-modal").modal("hide")
                        $.pjax.reload({container:"#agama-gridview"})
                    }
                    else{
                        alert("Saved");
                    }                
                }
            });
            return false;
        } else {
            !cancel || cancel();
        }
    }
});

*/

/*yii.confirm = function (message, ok, cancel) {
 
    bootbox.confirm(
        {
            message: message,
            buttons: {
                confirm: {
                    label: "OK"
                },
                cancel: {
                    label: "Cancel"
                }
            },
            callback: function (confirmed) {
                if (confirmed) {
                    // !ok || ok();
                      // !ok || ok();
                } else {
                    !cancel || cancel();
                }
            }
        }
    );
    // confirm will always return false on the first call
    // to cancel click handler
    return false;
}*/


function submitForm($form) {
    $.post(
        $form.attr("action"), // serialize Yii2 form
        $form.serialize()
    )
        .done(function(result) {
            $form.parent().html(result.message);
            $('#modal').modal('hide');
            
        })
        .fail(function() {
            console.log("server error");
            $form.replaceWith('<button class="newType">Fail</button>').fadeOut()
        });
    return false;
}



function urlKu(url,val,con){
     // alert(url);
    $.pjax.reload({
        url: url+val,
        container: con,
        timeout: 1000,
    });

}



$('#myModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var modal = $(this)
        var title = button.data('title') 
        var href = button.attr('href') 
        modal.find('.modal-title').html(title)
        modal.find('.modal-body').html('<i class=\"glyphicon glyphicon-edit\"></i>')
        $.post(href)
            .done(function( data ) {
                modal.find('.modal-body').html(data)
            });
});

