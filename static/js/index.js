Vue.component('my-publication', {
	props: ['pub'],
	template: `
	<div class="box">
		<div class="columns">
			<div class="column is-3">
				<img src="" style="width:100%; height:auto" v-bind:src="pub.image"/>
			</div>

			<div class="column is-9" v-bind:style="pub.bgColor">
				<div class="block">
					<p class="paper-title">{{ pub.title }}</p>
					<p class="paper-author">{{ pub.authors }}</p>
					<p class="paper-publisher"><span v-html="pub.publisher"></span></p>
				</div>

				<a v-bind:href="pub.paper" target="_blank" style="font-weight:bold; vertical-align: middle; color:#787878">
					<img alt="Paper" src="./static/images/img/paper.png" border="0" title="Paper"></a>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<a v-bind:href="pub.video" target="_blank" style="font-weight:bold; vertical-align: middle; color:#787878">
					<img alt="Video" src="./static/images/img/video.png" border="0" title="Video"></a>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<a v-bind:href="pub.presentation" target="_blank" style="font-weight:bold; vertical-align: middle; color:#787878">
					<img alt="Presentation" src="./static/images/img/ppt.png" border="0" title="Presentation"></a>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<a v-bind:href="pub.project" target="_blank" style="font-weight:bold; vertical-align: middle; color:#787878">
					<img alt="Project Page" src="./static/images/img/home.png" border="0" title="Project"></a>
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

			$.getJSON( "./data.json", function(json) {
				vm.jsondata = json
			});
		},
	},
})

app.loadData()