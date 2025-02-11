import { Calendar } from "@fullcalendar/core";
import interactionPlugin from "@fullcalendar/interaction";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";
// import listPlugin from "@fullcalendar/list";
import axios from 'axios';

const calendarEl = document.getElementById("calendar");

/**
 * カレンダー のイベントを取得するために使用
 *
 * @param {Object} info - FullCalendar から提供される情報オブジェクト。表示範囲の開始日と終了日を含む。
 * @param {Function} successCallback - イベントの取得が成功した場合に呼び出されるコールバック関数。
 * @param {Function} failureCallback - イベントの取得が失敗した場合に呼び出されるコールバック関数。
 */
const fetchEvents = function (info, successCallback, failureCallback) {
    axios
        .post("/schedule-get", {
            start_date: info.start.valueOf(),
            end_date: info.end.valueOf(),
        })
        .then((response) => {
            calendar.removeAllEvents();
            successCallback(response.data);
        })
        .catch(() => {
            alert("登録に失敗しました");
        });
};

/**
 * FullCalendar で日付・時間範囲が選択されたときに呼び出され、イベントを保存する
 *
 * @param {Object} info - FullCalendar から提供される情報オブジェクト。選択された開始日と終了日を含む。
 */
const handleSelect = function (info) {
    const eventName = prompt("イベントを入力してください");

    if (eventName) {
        axios
            .post("/schedule-add", {
                start_date: info.start.valueOf(),
                end_date: info.end.valueOf(),
                event_name: eventName,
            })
            .then(() => {
                calendar.addEvent({
                    title: eventName,
                    start: info.start,
                    end: info.end,
                    allDay: false,
                });
            })
            .catch((error) => {
                console.error("Error response:", error.response);
                alert("登録に失敗しました");
            });
    }
};

/**
 * FullCalendar のインスタンスを作成し、カレンダーを初期化
 *
 * @param {HTMLElement} calendarEl - カレンダーを表示する HTML 要素。
 * @param {Object} options - カレンダーの設定オブジェクト。
 * @param {Array} options.plugins - 使用する FullCalendar のプラグインの配列。
 * @param {string} options.initialView - 初期表示のカレンダービュー。
 * @param {Object} options.headerToolbar - カレンダーのヘッダーツールバーの設定。
 * @param {string} options.headerToolbar.left - ヘッダーの左側に表示するボタン。
 * @param {string} options.headerToolbar.center - ヘッダーの中央に表示するタイトル。
 * @param {string} options.headerToolbar.right - ヘッダーの右側に表示するボタン。
 * @param {string} options.locale - カレンダーのロケール設定。
 * @param {boolean} options.selectable - 日付・時間範囲の選択を可能にするかどうか。
 * @param {Function} options.events - イベントを取得するための関数。
 * @param {Function} options.select - 日付・時間範囲が選択されたときに呼び出される関数。
 */
let calendar = new Calendar(calendarEl, {
    plugins: [interactionPlugin, dayGridPlugin, timeGridPlugin],
    initialView: "dayGridMonth",
    headerToolbar: {
        left: "prev,next today",
        center: "title",
        right: "dayGridMonth timeGridWeek",
    },
    locale: "ja",
    selectable: true,
    allDaySlot: true,
    events: fetchEvents,
    select: handleSelect,
});

calendar.render();
