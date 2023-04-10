<div class="flex items-center justify-center" x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>
    <div class="max-w-lg w-full shadow-lg">
        <div class="md:p-8 p-5 dark:bg-gray-800 bg-white rounded-t">
            <div class="px-4 flex items-center justify-between">
                <span  tabindex="0" class="focus:outline-none  text-xl font-bold dark:text-gray-100 text-gray-800">
                    <span x-text="MONTH_NAMES[month]"></span>
                    <span x-text="year"></span>
                </span>
                <div class="flex items-center">
                    <button aria-label="calendar backward"
                        :class="{'cursor-not-allowed opacity-25': month == 0 }"
                        :disabled="month == 0 ? true : false"
                        @click="month--; getNoOfDays();"
                        class="focus:text-gray-400 hover:text-gray-400 text-gray-800 dark:text-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <polyline points="15 6 9 12 15 18" />
                    </svg>
                </button>
                <button aria-label="calendar forward"
                        :class="{'cursor-not-allowed opacity-25': month == 11 }"
                        :disabled="month == 11 ? true : false"
                        @click="() => {month++; getNoOfDays()}"
                        class="focus:text-gray-400 hover:text-gray-400 ml-3 text-gray-800 dark:text-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler  icon-tabler-chevron-right" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <polyline points="9 6 15 12 9 18" />
                    </svg>
                </button>

                </div>
            </div>
            <div class="flex items-center justify-between pt-12">
                <div class="-mx-1 -mb-1">
                    <div class="flex flex-wrap">
                        <template x-for="(day, index) in DAYS" :key="index">
                            <div style="width: 14.26%" class="px-2 py-2">
                                <div
                                    x-text="day"
                                    class="text-gray-600 text-sm uppercase tracking-wide font-bold text-center"></div>
                            </div>
                        </template>
                    </div>
                    <div class="flex flex-wrap" x-data="{ isToday: isToday }" >
                        <template x-for="blankday in blankdays">
                            <div
                                style="width: 14.28%; height: 70px"
                                class="text-center px-4 pt-2"
                            ></div>
                        </template>
                        <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">
                            <div style="width: 14.28%; height: 70px" class="flex justify-center items-center">
                                <div x-show="isToday(date)" class="flex items-center justify-center w-full rounded-full cursor-pointer">
                                    <a role="link" x-text="date" tabindex="0" class="focus:outline-none select-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 focus:bg-indigo-500 hover:bg-indigo-500 text-base w-8 h-8 flex items-center justify-center font-medium text-white bg-indigo-700 rounded-full"></a>
                                </div>
                                <div x-show="!isToday(date)" class="flex items-center justify-center w-full rounded-full cursor-pointer">
                                    <p class="text-base text-gray-500 dark:text-gray-100 font-medium hover:bg-slate-200 w-8 h-8 rounded-full flex justify-center items-center select-none" x-text="date"></p>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const MONTH_NAMES = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    const DAYS = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

    function app() {
        return {
            month: '',
            year: '',
            no_of_days: [],
            blankdays: [1,2,3,4,5,6],
            days: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],

            initDate() {
                let today = new Date();
                this.month = today.getMonth();
                this.year = today.getFullYear();
                this.datepickerValue = new Date(this.year, this.month, today.getDate()).toDateString();
            },

            isToday(date) {
                const today = new Date();
                const d = new Date(this.year, this.month, date);
                console.log(d, today)

                return today.toDateString() === d.toDateString() ? true : false;
            },

            getNoOfDays() {
                let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();

                // find where to start calendar day of week
                let dayOfWeek = new Date(this.year, this.month).getDay();
                let blankdaysArray = [];
                for ( var i=1; i <= dayOfWeek; i++) {
                    blankdaysArray.push(i);
                }

                let daysArray = [];
                for ( var i=1; i <= daysInMonth; i++) {
                    daysArray.push(i);
                }

                this.blankdays = blankdaysArray;
                this.no_of_days = daysArray;
            },
        }
    }
</script>
