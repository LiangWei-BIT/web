Vue.component('my-publication', {
	props: ['pub'],
	template: `
	<div class="box">
		<div class="columns">
			<div class="column is-3">
				<img style="width:100%; height:auto" v-bind:src="pub.image"/>
			</div>

			<div class="column is-9" v-bind:style="pub.bgColor">
				<div class="block">
					<div class="paper-title"><span>{{ pub.title }}</span></div>
					<div class="paper-author"><span>{{ pub.authors }}</span></div>
					<div class="paper-publisher"><span v-html="pub.publisher"></span></div>
					<div class="paper-links">
						<a v-bind:href="pub.paper" target="_blank">Paper</a>
						&nbsp;&nbsp;
						<a v-bind:href="pub.video" target="_blank">Video</a>
						&nbsp;&nbsp;
						<a v-bind:href="pub.project" target="_blank">Website</a>
					</div>
					<p class="paper-description">{{ pub.description }}</>
				</div>
			</div>
		</div>
	</div>`,
})

function getPublications(jsondata) {
	let pubs
	if (jsondata == undefined) {
		pubs = []        
	} else {
		pubs = jsondata['publications']
	}

	for (let i = 0; i < pubs.length; i++) {
		if (i % 2 == 1) {
			pubs[i]['bgColor'] = { "background-color": "#E8E8E8" }
		} else {
			pubs[i]['bgColor'] = { "background-color": "#ffffff" }
		}
	}
	return pubs
}

function getNews(jsondata) {
	if (jsondata['news'] == undefined) {
		return []
	}
	else {
		return jsondata['news'].slice(0,8)
	}
}


let app = new Vue({
	el: '#app',
	data: {
		jsondata: {'publications': [], 'news': []},
	},
	computed: {
		pubs() {
			return getPublications(this.jsondata)
		},
		news() {
			return getNews(this.jsondata)
		}
	},
	methods: {
		loadData() {
			let vm = this
			vm.jsondata = data
		},
	},
})

app.loadData()