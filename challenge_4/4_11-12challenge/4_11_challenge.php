<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>タスク4-0-1</title>
</head>
<body>
    <?php
    /*
     * 問1.この初期化は何を表しているか答えなさい
     * 答.作成するタイムスタンプの引数の初期値を表している。
     */
    $hour=0;
    $min=0;
    $sec=0;
    $month=1;
    $day=1;
    $year=2015;
    $befor_month=0;

    /*
     * 問2.このループにおける繰り返し条件を答えなさい
     * 答.$dayが365以内
     *
     * 問3.このループの目的を答えなさい
     * 答.1日ごとに日にちを加算し、タイムスタンプを作成・日付を表示するため。
     */
    while($day<=365){

        /*
         * 問4.下行の処理の動作を答えなさい
         * 答.$hourから$yearまでを引数としたタイムスタンプを作成する。
         *
         * 問5.なぜ下行のような処理を行っているのかを答えなさい
         * 答.タイムスタンプは数値として扱われるため日付の操作や条件分岐を扱いやすいため。
         */
        $timestamp = mktime($hour, $min, $sec, $month, $day, $year);


        /*
         * 問6.下行の処理の動作を答えなさい
         * 答.上行で作成したタイムスタンプを利用して、'月'を$now_monthに代入している。
         *
         * 問7.なぜ下行のような処理を行っているのかを答えなさい
         * 答.これ以下の行で'月'の値による条件分岐を行うため。
         */
        $now_month=date('m', $timestamp);

        /*
         * 問8.この条件分岐はどのような条件で行われているのか答えなさい
         * 答.$befor_month(全ループの月の値)の値が$now_month(最新ループの月の値)と等しくないという条件
         *
         * 問9.条件分岐の目的を答えなさい
         * 答.月が切り替わったタイミングだけヘッダーとして'X月'を表示するため。
         */
        if($befor_month!=$now_month){

            /*
            * 問10.なぜ下行のような処理を行っているのかを答えなさい
            * 答.最新のループの月の値を次のループにおける「前のループの月の値」として使用するため。
            */
            $befor_month=$now_month;

            /*
            * 問11.下行の処理の動作を答えなさい
            * 答.月の値をヘッダーとして表示する。
            */
            echo '<br>'.$now_month.'月<br>';
        }

        /*
         * 問12.下行の処理の動作を答えなさい
         * 答.タイムスタンプを利用して、日付を年月日表記で表示、また、タイムスタンプの総秒値も連結して表示する。
         *
         * 問13.なぜ下行のような処理を行っているのか答えなさい
         * 答.各日付がタイムスタンプの総秒値としてどう表示されるか比較するため。
         */
        echo date('Y年m月d日', $timestamp).'タイムスタンプ:'.$timestamp.'<br>';

        /*
         * 問14.なぜ下行のような処理を行っているのか答えなさい
         * 答.次のループで一日後のタイムスタンプを作成するため。
         */
        $day++;
    }

    /*
     * 問15.このプログラムは、何を目的とした処理なのかを要約して答えなさい
     * 答.2015年1月1日から2015年12月31日までの各日付とタイムスタンプを表示し比較することを目的としている。
          さらに言えば一日で何秒経過するかを確認するため。
     *
     * 問16.このままでは本来この処理が望んでいる結果になっていない。何が問題で、どこをどう修正すべきか答えなさい
     * 答.プログラム冒頭でbefore_monthが初期化されていない($before_month= 0;)。
     *
     */

    ?>
</body>
</html>

