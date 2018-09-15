$(() => {
  const id = getQueryVariable('id')
   $('.section .container').append(`<a href="/vote.php?id=${id}" id="download-button" class="btn-large waves-effect waves-light orange" style="margin-bottom: 64px">戻る</a>`)
  if (!id) {
    document.write('ERROR!')
    return
  }
  // オートコンプリート用キーワードの取得と設定
  $.ajax({
    url: `/api/data.php?id=${id}`,
    type: 'GET'
  })
    // Ajaxリクエストが成功した時発動
    .done((result) => {
      console.log(result);
      
      const data = $.parseJSON(result)
      $('#question').text(data.question)
      data.items.forEach(item => {
        $('#button-container').append(`<p id="download-button" class="btn-large orange" style="width:100%; cursor: auto">${item.name} : ${item.vote}票</a><br><br>`)
      })
    // Ajaxリクエストが失敗した時発動
    })
    .fail((result) => {
      console.log(result)
      $('#question').append("ERROR!")
    })
    // Ajaxリクエストが成功・失敗どちらでも発動
    .always((result) => {

    })
})

const getQueryVariable = variable => {
  var query = window.location.search.substring(1)
  var vars = query.split('&')
  for (var i = 0; i < vars.length; i++) {
    var pair = vars[i].split('=')
    if (decodeURIComponent(pair[0]) == variable) {
      return decodeURIComponent(pair[1])
    }
  }
  console.log('Query variable %s not found', variable)
}
