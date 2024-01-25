const {createApp, toRaw} = Vue

createApp({
    data() {
        return {
            titles: [
                'Continent',
                'Region',
                'Countries',
                'Life duration',
                'Population',
                'Cities',
                'Languages'
            ],
            indexOfColumnBySort: 0,
            isAscSort: true,
            statisticList: []
        }
    },
    computed: {
        sortedStatistic() {
            if (this.statisticList.length === 0)
                return [];

            // чтобы сохранить изначальную сортировку (сначала по континентам, а потом по регионам как в картинке на тестовом)
            if (this.indexOfColumnBySort === 0 && this.isAscSort) {
                return this.statisticList;
            }

            const columnKey = Object.keys(this.statisticList[0])[this.indexOfColumnBySort]
            return [...this.statisticList].sort((a, b) => {
                [a, b] = [a[columnKey], b[columnKey]]

                if (Number(a)) {
                    [a, b] = [Number(a), Number(b)]
                }
                if (a === b) return 0
                console.log(this.isAscSort)
                if (this.isAscSort) {
                    return a > b ? 1 : -1

                } else {
                    return a < b ? 1 : -1
                }
            })
        }
    },
    mounted() {
        this.getStatistic()
    },
    methods: {
        async getStatistic() {
            const res = await fetch('/statistic')

            this.statisticList = await res.json()
        },
        changeSorting(indexOfColumn) {
            if (indexOfColumn === this.indexOfColumnBySort) {
                this.isAscSort = !this.isAscSort
            } else {
                this.isAscSort = true
                this.indexOfColumnBySort = indexOfColumn
            }
        }
    }
}).mount('#app')
