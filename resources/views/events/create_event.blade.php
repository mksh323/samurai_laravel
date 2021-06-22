@extends('layouts.layouts')

@section('title', 'My Calendar')

@section('add')
<!-- <div class="content"> -->
    <button type="button"　class="js-modal-open　btn-outline-light　btn-lg" href="">New Event</button>
        <a class="js-modal-open02" href=""></a>
        </div><div id="modal01" class="modal js-modal">
            <div class="modal__bg js-modal-close"></div>
            <div class="modal__content">
                <input type="hidden" id="id" value="">
                <label>start date: <input type="date" id="start_date" value=""></label><br>
                <label>end date: <input type="date" id="end_date" value=""></label><br>
                <label>start time: <input type="time" id="start_time" value=""></label><br>
                <label>end time: <input type="time" id="end_time" value=""></label><br>
                <label>title: <input type="text" id="title" value=""></label><br>
                <label>content: <input type="text" id="content" value=""></label><br>
                <button type="submit" class="add" id="add">add</button>
                <a class="js-modal-close" href=""><i class="zmdi zmdi-close"></i></a>
            </div>
        </div>
        </div><div id="modal02" class="modal js-modal02">
            <div class="modal__bg js-modal-close"></div>
            <div class="modal__content">
                <input type="hidden" id="id" value="">
                <label>start date: <input type="date" id="start_date_edit" value=""></label><br>
                <label>end date: <input type="date" id="end_date_edit" value=""></label><br>
                <label>start time: <input type="time" id="start_time_edit" value=""></label><br>
                <label>end time: <input type="time" id="end_time_edit" value=""></label><br>
                <label>title: <input type="text" id="title_edit" value=""></label><br>
                <label>content: <input type="text" id="content_edit" value=""></label><br>
                <button type="submit" class="edit" id="update">edit</button>
                <a class="js-modal-close02" href=""><i class="zmdi zmdi-close"></i></a>
            </div>
        </div>
        </div><div id="modal03" class="modal js-modal03">
            <div class="modal__bg js-modal-close"></div>
            <div class="modal__content">
                <p>編集しますか？削除しますか？</p>
                <input type="button" id="edit" name="edit" value="edit" />
                <input type="button" id="delete" name="delete" value="delete" />
                <input type="button" id="cancel" name="cancel" value="cancel" />
            </div>
        </div> 
<!-- </div>  -->
@endsection