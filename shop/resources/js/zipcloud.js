$(function() {
    $('#zip').on('click', function() {
        //入力された郵便番号でWebAPIに住所情報をリクエスト
        $.ajax({
            url: "http://zipcloud.ibsnet.co.jp/api/search?zipcode=" + $('#postcode').val(),
            dataType : 'jsonp',
        }).done(function(data) {
            if (data.results) {
                //関数を呼び出す
                setData(data.results[0]);
            } else {
                alert('該当するデータが見つかりませんでした');
            }
        }).fail(function(data) {
            alert('通信に失敗しました');
        });
    });
    
    //データ取得が成功した時の処理
    function setData(data) {
        //取得したデータを各HTML要素に代入
        $('#prefecture').val(data.address1); //都道府県
        $('#city').val(data.address2 + data.address3);
    }
});