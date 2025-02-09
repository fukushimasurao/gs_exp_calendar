import { Calendar } from "@fullcalendar/core";
import interactionPlugin from "@fullcalendar/interaction";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";
// import listPlugin from "@fullcalendar/list";
import axios from 'axios';

var calendarEl = document.getElementById("calendar");

let calendar = new Calendar(calendarEl, {
    plugins: [interactionPlugin, dayGridPlugin, timeGridPlugin],
    // plugins: [interactionPlugin, dayGridPlugin, timeGridPlugin, listPlugin],


    initialView: "dayGridMonth",
    headerToolbar: {
        left: "prev,next today",
        center: "title",
        right: "dayGridMonth",

        // right: "dayGridMonth,timeGridWeek,listWeek",
    },
    locale: "ja",

    events: function (info, successCallback, failureCallback) {
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
    },

    selectable: true,
    select: function (info) {
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
    },
});
calendar.render();
