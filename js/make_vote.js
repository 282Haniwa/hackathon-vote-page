$(document).ready(function(){
    $('select').formSelect();
    $(document).on("click", ".add-btn", function () {
        var num = Number($(this).text().replace("ボタン", ""));
        var html = '<button type="button" class="add-btn">ボタン' + (num + 1) + '</button>';
        $(".btn-area").append(html);
    });
    $('#number').change(function() {
        var val = $(this).val();
        console.log(val);
        for(var i=0; i<val; i++){
            $('#input-wrappr').append('<input type="text">');
        }
    });
});


// $(function(){
//     var idNo = 1;
    
//     // 追加ボタン押下時イベント
//     $('button#addButton').on('click',function(){
//         $('div#templateForm')
//             // コピー処理
//             .clone(true)
//             // 不要なID削除
//             .removeAttr("id")
//             // 非表示解除
//             .removeClass("notDisp")
//             // テキストボックスのID追加
//             .find("input[name=templateTextbox]")
//             .attr("id", "textbox_" + idNo)
//             .end()
//             // ボタンのID追加
//             .find("button[name=templateButton]")
//             .on('click',function(){alert($(this).attr('id'));})
//             .attr("id", "button_" + idNo)
//             .end()
//             // 情報表示
//             .find("span.dispInfo")
//             .text("id[" + idNo + "] TextBox_ID[" + "textbox_" + idNo + "] Button_ID:[" + "button_" + idNo + "]")
//             .end()
//             // 追加処理
//             .appendTo("div#displayArea");
  
//         // ID番号加算
//         idNo++;
//     });
  
//     // 削除ボタン押下時イベント
//     $('button[name=removeButton]').on('click',function(){
//         $(this).parent('div').remove();
//     });
    
//     // 削除ボタン押下時イベント
//     $('button[name=removeButton]').on('click',function(){
//         $(this).parent('div').remove();
//     });
// });