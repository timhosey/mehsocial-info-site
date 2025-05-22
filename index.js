var every = 5;




document.addEventListener("DOMContentLoaded", function() {

	let spin, count = every;

	// let's find the things in the page
	
	h = {};

	[
		"countdown",
		"h_device", "h_cpu", "h_memory", "h_os", "h_uptime",
		"s_cpu", "b_cpu", "s_mem", "b_mem", "s_swa", "b_swa", "s_sto", "b_sto",
		"m_ver", "m_ucount", "m_posts", "m_domains", "m_backup"
	].forEach( x => {
		h[x] = document.querySelector(`#${x}`);
	} );


	// helper functions
	function humantime(raw) {

		const scale = {
			//"y": 31536000,
			//"mo": 2592000,
			"d": 86400,
			"h": 3600,
			"m": 60
		}

		let txt = "", count;

		for (unit in scale) {
			count = Math.floor(raw / scale[unit]);
			raw = Math.floor(raw % scale[unit]);
			if (count > 0) txt += `${count}${unit} `;
		}

		if (raw > 0) txt += `${Math.floor(raw)}s`;


		return txt;

	}

	function humansize(size) {
		// presumes megabyes -- where did I find this?
		const units = 'MGTPEZY';
		let l = 0, n = parseFloat(size, 10) || 0;
		while(n >= 1024 && ++l) n = n/1024;
		return n.toFixed(2) + units[l];

	}



	async function mehstats() {

		let query = await fetch("cgi-bin/mehinfo", { method: "GET" });
		let res = JSON.parse(await query.text());


		if (res.err != 0) {
			alert(res.txt);
			clearInterval(spin);
		}

		// system memory
		h.h_memory.innerHTML = humansize(res.ram.size);

		// uptime
		h.h_uptime.innerHTML = humantime(res.uptime);

		h.s_cpu.innerHTML = h.b_cpu.style.width = res.cpu.perc + '%';
		h.s_mem.innerHTML = h.b_mem.style.width = res.ram.perc + '%';
		h.s_swa.innerHTML =	h.b_swa.style.width = res.swap.perc + '%';
		h.s_sto.innerHTML =	h.b_sto.style.width = res.disk.perc + '%';

	}

	mehstats();

	spin = setInterval(function() {
		h.countdown.innerHTML = count + "s";
		count--;
		if (count == -1) {
			mehstats();
			count = every;
		}

	}, 1000);


	// get mastodon stats
	async function mehstodon() {
		let query = await fetch("https://meh.social/api/v1/instance");
		let res = JSON.parse(await query.text());


		h.m_ver.innerHTML = res.version;
		h.m_ucount.innerHTML = res.stats.user_count;
		h.m_posts.innerHTML = res.stats.status_count;
		h.m_domains.innerHTML = res.stats.domain_count;
		h.m_backup.innerHTML = "backup in transition!";

		let devq = await fetch("device.js");
		let dev = JSON.parse(await devq.text());

		h.h_device.innerHTML = dev.device;
		h.h_cpu.innerHTML = dev.cpu;
		h.h_os.innerHTML = dev.os;


	}

	mehstodon();




});
