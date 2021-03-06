@extends('layouts.default')

<style>
    h4 {
        text-align: center;
        line-height: 0.5em;
    }

    .period {
        margin-top: 30px;
    }

    table {
        font-size: 13px;
    }

    .pes th {
        font-size: 20px;
    }

    .pes td.title{
        font-size: 15px;
    }

    .pes tbody td, .pes thead{
        border: 1px solid;
        border-color: rgba(0,0,0, 1) !important;
    }

    .pes .answer {
        border: 0px;
        width: 30px;
        height: 2em;
    }

</style>
@section('content')
    <h4>Evaluation Result of: {{{ isset($user->bio->lastname) ? ucfirst($user->bio->lastname) : '' }}}, {{{ isset($user->bio->firstname) ? ucfirst($user->bio->firstname) : '' }}} {{{ isset($user->bio->middlename) ? ucfirst($user->bio->middlename) : '' }}}.
        <a href="#" class="btn btn-primary printPes">Print</a></h4>
    <iframe id="print" src="/print/pes?eval_id={{ $evaluation->id }}" frameborder="0" style="display: none;"></iframe>
    {{ Form::open(['url' => '/supervisors/doPes/'.$user->employee_no, 'method' => 'POST']) }}
    <h3>Instuctions</h3>
    <ol>
        <li>This form is used for evaluating the performance of your Casual, Contractual and Job Order Employees. Reproduction of this form is allowed.</li>
        <li>Please observe fairness and objectivity when rating.</li>
        <li>In your rating, check the box that most objectively represents the ratee’s level of performance guided by the definitions of rating under each factor.
            <br>Please use the rating scale below:
            <br/>

            <table class="table">
                <thead>
                <th>SCALE</th>
                <th>ADJECTIVE RATING</th>
                </thead>

                <tbody>
                <tr>
                    <td>10</td>
                    <td><b>O</b> (Outstanding)</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td><b>VS</b> (Very Satisfactory)</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td><b>S</b> (Satisfactory)</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td><b>U</b> (Unsatisfactory)</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><b>P</b> (Poor)</td>
                </tr>
                </tbody>
            </table>
        </li>
        {{--<li>Ensure that signatures are properly affixed after accomplishing this form</li>--}}
    </ol>

    <table class="table pes">
        <thead>
        <th>JOB FACTORS</th>
        <th colspan="5" style="text-align: center;">SCORE</th>
        </thead>

        <tbody>
        <tr>
            <td colspan="6" class="title">PART I - PERFORMANCE(70%)</td>
        </tr>

        <tr>
            <td>
                WORK QUANTITY/OUTPUT <br/>
                Overall work accomplishment in relation with targets/assigned tasks
            </td>
            <td colspan="5" style="text-align: center;">{{ $evaluation->q1 }}</td>
            <input type="hidden" class="answer" name="q1" value="{{ $evaluation->q1 }}"/>
        </tr>

        <tr>
            <td>
                WORK QUALITY <br/>
                Efficiency and effectiveness vis a vis job requirement and expectations.
            </td>
            <td colspan="5" style="text-align: center;">{{ $evaluation->q2 }}</td>
            <input type="hidden" class="answer" name="q2" value="{{ $evaluation->q2 }}"/>
        </tr>

        <tr>
            <td>
                WORK ATTITUDE <br/>
                Pride, interest and job dedication, cheerfulness despite work pressures.
            </td>
            <td colspan="5" style="text-align: center;">{{ $evaluation->q3 }}</td>
            <input type="hidden" class="answer" name="q3" value="{{ $evaluation->q3 }}"/>
        </tr>

        <tr>
            <td colspan="6" class="title">PART II - CRITICAL FACTORS(30%)</td>
        </tr>

        <tr>
            <td>
                PUNCTUALITY AND ATTENDANCE <br/>
                Observed behavior of coming to the office or to be present at work to complete assigned tasks
            </td>
            <td colspan="5" style="text-align: center;">{{ $evaluation->q4 }}</td>
            <input type="hidden" class="answer" name="q4" value="{{ $evaluation->q4 }}"/>
        </tr>

        <tr>
            <td>
                COURTESY <br/>
                Polite, kind & thoughtful behavior towards the public/clientele in manners of speech and actions
            </td>
            <td colspan="5" style="text-align: center;">{{ $evaluation->q5 }}</td>
            <input type="hidden" class="answer" name="q5" value="{{ $evaluation->q5 }}"/>
        </tr>

        <tr>
            <td>
                HUMAN RELATIONS <br/>
                Concern for people at work, including supervisor-subordinate relationship and office clientele
            </td>
            <td colspan="5" style="text-align: center;">{{ $evaluation->q6 }}</td>
            <input type="hidden" class="answer" name="q6" value="{{ $evaluation->q6 }}"/>
        </tr>

        <tr>
            <td>
                INITIATIVE <br/>
                Starts action, projects and performs assigned tasks without being told and under minimal supervision
            </td>
            <td colspan="5" style="text-align: center;">{{ $evaluation->q7 }}</td>
            <input type="hidden" class="answer" name="q7" value="{{ $evaluation->q7 }}"/>
        </tr>

        <tr>
            <td>
                STRESS TOLERANCE <br/>
                Stability of performance under pressure or opposition
            </td>
            <td colspan="5" style="text-align: center;">{{ $evaluation->q8 }}</td>
            <input type="hidden" class="answer" name="q8" value="{{ $evaluation->q8 }}"/>
        </tr>

        <tr>
            <td>
                JUDGEMENT/DECISION MAKING <br/>
                Ability to develop alternative solutions to problems to reach a sound decision & readiness to take action or commit oneself
            </td>
            <td colspan="5" style="text-align: center;">{{ $evaluation->q9 }}</td>
            <input type="hidden" class="answer" name="q9" value="{{ $evaluation->q9 }}"/>
        </tr>

        <tr>
            <td>
                INTEGRITY <br/>
                Trustworthiness, honesty, and honor of the person
            </td>
            <td colspan="5" style="text-align: center;">{{ $evaluation->q10 }}</td>
            <input type="hidden" class="answer" name="q10" value="{{ $evaluation->q10 }}"/>
        </tr>

        <tr>
            <td colspan="6" class="title">PART III - SCORE</td>
        </tr>

        <tr>
            <td colspan="3" class="title">I AVERAGE RATING (SUM/3 x 70%)</td>
            <td colspan="3" class="title"> <span class="part1"></span></td>
        </tr>
        <tr>
            <td colspan="3" class="title">II AVERAGE RATING (SUM/7 x 30%)</td>
            <td colspan="3" class="title"> <span class="part2"></span></td>
        </tr>
        <tr>
            <td colspan="3" class="title">OVERTALL POINT SCORE (PART I + PART II)</td>
            <td colspan="3" class="title"> <span class="overall"></span></td>
        </tr>
        <tr>
            <td colspan="3" class="title">ADJECTIVAL RATING</td>
            <td colspan="3" class="title"> <span class="adjective"></span></td>
        </tr>
        </tbody>
    </table>

    <br/>

    {{ Form::close() }}

    @if(Auth::getUser()->employee_no == $evaluation->employee_no && $evaluation->status == 'inactive')
        <label for="honest" style="font-size: 20px">
            <input type="checkbox" id="honest"/>
            The above rating has been discussed with me by my immediate supervisor on _________________. Areas for improvement have been mutually agreed upon and I fully commit myself to achieve these objectives.
        </label>

        {{ Form::open(['url' => '/employees/submit-pes/'. $evaluation->id, 'method' => 'post']) }}
            <button class="btn btn-primary btnSubmit" type="submit" disabled>Accept and Send Performance Evaluation to HR</button>
        {{ Form::close() }}
    @endif

    @if( $evaluation->status == 'active' )
        <p>This evaluation was already submitted to the HR.</p>
    @endif
@stop

@section('page-script')
    <script type="text/javascript">
        $('#honest').on('change', function(e) {
            if($(this).is(':checked')) {
                $('.btnSubmit').attr('disabled', false);
            } else {
                $('.btnSubmit').attr('disabled', true);
            }
        });

        $(".form_datetime").datetimepicker({
            format: "yyyy-mm-dd hh:ii:ss",
            autoclose: true,
            todayBtn: true,
            pickerPosition: "bottom-left"
        });

        var q1  = parseInt($('.answer[name="q1"]').val()),
                q2  = parseInt($('.answer[name="q2"]').val()),
                q3  = parseInt($('.answer[name="q3"]').val()),
                q4  = parseInt($('.answer[name="q4"]').val()),
                q5  = parseInt($('.answer[name="q5"]').val()),
                q6  = parseInt($('.answer[name="q6"]').val()),
                q7  = parseInt($('.answer[name="q7"]').val()),
                q8  = parseInt($('.answer[name="q8"]').val()),
                q9  = parseInt($('.answer[name="q9"]').val()),
                q10 = parseInt($('.answer[name="q10"]').val());

        var calculatePart1 = function() {
            return ((q1 + q2 + q3)/3) * 0.7;
        };

        var calculatePart2 = function() {
            return ((q4 + q5 + q6 + q7 + q8 + q9 + q10)/7) * 0.3;
        };

        var calculate = function() {
            q1  = parseInt($('.answer[name="q1"]').val()),
                    q2  = parseInt($('.answer[name="q2"]').val()),
                    q3  = parseInt($('.answer[name="q3"]').val()),
                    q4  = parseInt($('.answer[name="q4"]').val()),
                    q5  = parseInt($('.answer[name="q5"]').val()),
                    q6  = parseInt($('.answer[name="q6"]').val()),
                    q7  = parseInt($('.answer[name="q7"]').val()),
                    q8  = parseInt($('.answer[name="q8"]').val()),
                    q9  = parseInt($('.answer[name="q9"]').val()),
                    q10 = parseInt($('.answer[name="q10"]').val());

            var part1       = calculatePart1(),
                    part2       = calculatePart2(),
                    overall     = (part1 + part2),
                    rating      = '';

            $('.part1').html(part1.toFixed(2));
            $('.part2').html(part2.toFixed(2));
            $('.overall').html(overall.toFixed(2));

            if (overall > 8) {
                rating = 'O (OUTSTANDING)';
            } else if (overall > 6 && overall <= 8) {
                rating = 'VS (VERY SATISFACTORY)';
            } else if (overall > 4 && overall <= 6) {
                rating = 'S (SATISFACTORY)';
            } else if (overall > 2 && overall <= 4) {
                rating = 'U (UNSATISFACTORY)';
            } else if (overall <= 2) {
                rating = 'P (POOR)';
            }
            $('.adjective').html(rating);

            console.log(q1);
        };

        $(function() {
            calculate();

            $('.answer').on('change', function() {
                calculate();
            });
        });

        function printIframe(id)
        {
            var iframe = document.frames ? document.frames[id] : document.getElementById(id);
            var ifWin = iframe.contentWindow || iframe;
            iframe.focus();
            ifWin.printMe();
            return false;
        }

        $('.printPes').click(function() {
            printIframe('print');
        });
    </script>
@stop
