
    {{ $receiver['name'] }} 様
    
    このたびは、「Handmade shop」をご利用いただきありがとうございます。
    お客様のご注文を以下の内容で承りました。
    
    
    ■ご注文内容■
    @foreach ($orders as $order)
    {{ $order['item'] }}　{{ $order['price'] }}円 {{ $order['num'] }}個
    @endforeach
    合計金額{{ $sum }}円
    
    
    ■商品のお届け先■
    <お名前>{{ $receiver['name'] }}
    <ご住所>〒{{ $receiver['postcode'] }}{{ $receiver['prefecture'] }}{{ $receiver['city'] }}{{ $receiver['no'] }}
    <電話番号>{{ $receiver['tel'] }}
    
    ■お支払い方法■
    <お支払い方法>
    @if ($payment['payment'] == 'advance')
        前払い(銀行振込)
        
        以下の口座にお振込をお願いいたします。
    
        ABC銀行　abc支店
        普通　12345678
        Handmade shop
        <お支払い期限> ご注文日より３日後まで
        
        ※前払いを選ばれた場合は、ご入金確認後の発送となります。
        ※お支払い期限までにご入金がなかった場合は、ご注文をキャンセルさせていただきます。何卒ご了承ください。

    @else
        代金引換
    
        発送までしばらくお待ちください。
    @endif
    
    ご不明な点などがございましたら、お気軽にお知らせください。

