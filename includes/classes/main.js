

let id = $("input[name*='seriesId']")
id.attr("readonly", "readonly");


$(".btnedit").click(e=> { 
	let textvalues = displayData(e);

	let categoryId = $("input[name*='categoryId']");
	let name = $("input[name*='tvSeriesName']");
	let thumbnail = $("input[name*='thumbnailDirectory']");
	let preview = $("input[name*='previewDirectory']");


	id.val(textvalues[0]);
	categoryId.val(textvalues[1]);
	name.val(textvalues[2]);
	thumbnail.val(textvalues[3]);
	preview.val(textvalues[4]);

});

$(".btnedit.video").click(e=> { 
	let videotextvalues = displayDataVideo(e);

	let videoid = $("input[name*='videoid']");
	let videoTitle = $("input[name*='title']");
	let desc = $("input[name*='description']");
	let filePath = $("input[name*='filePath']");
	let isMovie = $("input[name*='isMovie']");
	let releaseDate = $("input[name*='releaseDate']");
	let duration = $("input[name*='duration']");
	let seriesId = $("input[name*='seriesVideoId']");
	let season = $("input[name*='season']");
	let episode = $("input[name*='episode']");

	videoid.val(videotextvalues[0]);
	videoTitle.val(videotextvalues[1]);
	desc.val(videotextvalues[2]);
	filePath.val(videotextvalues[3]);
	isMovie.val(videotextvalues[4]);
	releaseDate.val(videotextvalues[5]);
	duration.val(videotextvalues[6]);
	seriesId.val(videotextvalues[7]);
	season.val(videotextvalues[8]);
	episode.val(videotextvalues[9]);
});

function displayData(e){
	let id = 0;

	const td = $("#tbody tr td");
	let textvalues = [];

	for (const value of td){
    	if(value.dataset.id == e.target.dataset.id){
    		textvalues[id++] = value.textContent;
    	}
    }

    return textvalues;
}

function displayDataVideo(e){
	let id = 0;

	const td = $("#tbody tr td");
	let videotextvalues = [];

	for (const value of td){
    	if(value.dataset.id == e.target.dataset.id){
    		videotextvalues[id++] = value.textContent;
    	}
    }

    return videotextvalues;
}