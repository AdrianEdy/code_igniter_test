<style>
    body, h1, h2, h3 {
        margin: 0;
        padding: 0;
    }

    body { font-family: "Lucida Grande", "Myriad Pro", "Helvetica Neue","Helvetica", "Arial", sans-serif }

    a { text-decoration: none }

    #title {
        width: 282px;
        height: 129px;
        position: relative;
        margin: 100px auto;
        left: -25px;
    }

    .content {
        width: 1000px;
        margin-left: auto;
        margin-right: auto;
    }

    #calendar {
        width: 484px;
        height: 318px;
        margin-left: auto;
        margin-right: auto;
        margin-top: -20px;
    }

    #bottom-paper {
        margin-top: 30px;
        background-color: #fff;
        -webkit-box-shadow: 1px 5px 10px #272727;
        -moz-box-shadow: 1px 5px 10px #272727;
        box-shadow: 1px 5px 10px #272727;
        width: 484px;
        height: 318px;
    }

    #top-paper {
        text-align: center;
        margin-top: -327px;
        margin-left: -12px;
        background-color: #fff;
        -webkit-box-shadow: 1px 5px 10px #272727;
        -moz-box-shadow: 1px 5px 10px #272727;
        box-shadow: 1px 5px 10px #272727;
        width: 510px;
        height: 318px;
    }

    #salmon-header {
        background-color: #dd5b5b;
        width: 510px;
        height: 50px;
        margin-left: -12px;
        margin-top: -318px;
        border-bottom: 2px solid #b84c4c;
    }

    #month-title {
        text-align: center;
        margin-top: -37px;
        font-size: 20px;
        color: #fff;
    }

    #grey-header {
        text-align: center;
        word-spacing: 10px;
        margin-top: -30px;
        background-color: #dfdfdf;
        width: 510px;
        height: 50px;
        margin-left: -12px;
        margin-top: 14px;
        border-bottom: 2px solid #b4b4b4;
    }

    #days-of-the-week {
        text-align: center;
        word-spacing: 10px;
        margin-top: -35px;
        color: #444;
    }

    li { list-style: none }

    #column-one {
        margin-left: -275px;
        margin-top: 30px;
        line-height: 35px;
        text-align: center;
        color: #b7b7b7;
    }

    #column-two {
        margin-left: -175px;
        margin-top: -175px;
        line-height: 35px;
        text-align: center;
        color: #b7b7b7;
    }

    #column-three {
        margin-left: -84px;
        margin-top: -175px;
        line-height: 35px;
        text-align: center;
        color: #b7b7b7;
    }

    #column-four {
        margin-left: 15px;
        margin-top: -175px;
        line-height: 35px;
        text-align: center;
        color: #b7b7b7;
    }

    #column-five {
        margin-left: 100px;
        margin-top: -175px;
        line-height: 35px;
        text-align: center;
        color: #b7b7b7;
    }

    #column-six {
        margin-left: 188px;
        margin-top: -175px;
        line-height: 35px;
        text-align: center;
        color: #b7b7b7;
    }

    #column-seven {
        margin-left: 275px;
        margin-top: -175px;
        line-height: 35px;
        text-align: center;
        color: #b7b7b7;
    }

    span.current {
        color: #3d73b5;
        font-weight: bold;
    }

    span.other { color: #dcdbdb }
</style>
<div class="content">
    <div id="calendar">
        <div id="bottom-paper"></div>
        <div id="top-paper"></div>
        <div id="salmon-header"></div>
        <div id="month-title">December 2011</div>
        <div id="grey-header"></div>
        <div id="days-of-the-week">MON TUE WED THU FRI SAT SUN</div>

        <div id="column-one">
            <li><span class="other">27</span></li>
            <li>5</li>
            <li>12</li>
            <li>19</li>
            <li>26</li>
        </div>

        <div id="column-two">
            <li><span class="other">28</span></li>
            <li>6</li>
            <li>13</li>
            <li>20</li>
            <li>27</li>
        </div>

        <div id="column-three">
            <li><span class="other">29</span></li>
            <li>7</li>
            <li>14</li>
            <li>21</li>
            <li>28</li>
        </div>

        <div id="column-four">
            <li><span class="other">30</span></li>
            <li>8</li>
            <li>15</li>
            <li><span class="current">22</span></li>
            <li>29</li>
        </div>

        <div id="column-five">
            <li>1</li>
            <li>9</li>
            <li>16</li>
            <li>23</li>
            <li><span class="other">30</span></li>
        </div>

        <div id="column-six">
            <li>2</li>
            <li>10</li>
            <li>17</li>
            <li>24</li>
            <li><span class="other">31</span></li>
        </div>

        <div id="column-seven">
            <li>3</li>
            <li>11</li>
            <li>18</li>
            <li>25</li>
            <li><span class="other">1</span></li>
        </div>
    </div><!-- end #calendar -->
</div><!-- end .content -->
</body>
</html>
