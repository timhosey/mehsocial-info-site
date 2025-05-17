#include <stdio.h>
#include <stdlib.h>
#include <errno.h>
#include <linux/unistd.h>
#include <linux/kernel.h>
#include <sys/sysinfo.h>
#include <sys/statvfs.h>

#define SI_LOAD_SHIFT 16
#define DEFAULT_MOUNT "/mnt"
#define BYTE_DIVIDER 1048576


void mehdie(const char *string) {
	printf("Content-type: application/json\n\n");
	// {"err":1,"txt":"something bad happened"}
	printf("{ \"err\": 1, \"txt\": \"%s\" }\n", string);
	exit(1);
}


int main() {

	struct sysinfo info;
	struct statvfs fs;


	const char* mount = getenv("STATMOUNT");
	if (!mount) mount = DEFAULT_MOUNT;

	if (sysinfo(&info) != 0) mehdie("failed to get sysinfo");

	if (statvfs(mount, &fs) != 0) mehdie("failed to get fs info");

	int procs = get_nprocs_conf();
	

	double load_1m = (double)info.loads[0] / (1 << SI_LOAD_SHIFT);
	double load_5m = (double)info.loads[1] / (1 << SI_LOAD_SHIFT);
	double load_15m = (double)info.loads[2] / (1 << SI_LOAD_SHIFT);
	float cpu_perc = (load_1m / procs) * 100;

	//printf("CPU: load: %.2f/%.2f/%.2f, procs: %d, cpu%: %.2f\n", load_1m, load_5m, load_15m, procs, cpu_perc);
	

	/* honestly /proc/meminfo would be better */
	unsigned long ram_size = (info.totalram * info.mem_unit) / BYTE_DIVIDER;
	unsigned long ram_free = (info.freeram * info.mem_unit) / BYTE_DIVIDER;
	unsigned long ram_used = ram_size - ram_free;
	float ram_perc = ( (float) ram_used / (float) ram_size ) * 100;

	//printf("RAM: total: %d, used: %d, free, %d, perc: %.2f\n", ram_size, ram_used, ram_free, ram_perc);

	unsigned long swap_size = (info.totalswap * info.mem_unit) / BYTE_DIVIDER;
	unsigned long swap_free = (info.freeswap * info.mem_unit) / BYTE_DIVIDER;
	unsigned long swap_used = swap_size - swap_free;
	float swap_perc = ( (float) swap_used / (float) swap_size ) * 100;

	//printf("swap: total: %d, used: %d, free, %d, perc: %.2f\n", swap_size, swap_used, swap_free, swap_perc);


	unsigned long fs_size = (fs.f_blocks * fs.f_bsize) / BYTE_DIVIDER;
	unsigned long fs_free = (fs.f_bfree * fs.f_bsize) / BYTE_DIVIDER;
	unsigned long fs_used = fs_size - fs_free;
	float fs_perc = ( (float) fs_used / (float) fs_size) * 100;

	//printf("DISK (%s): size: %d, free; %d, used: %d, perc: %.2f\n", mount, fs_size, fs_free, fs_used, fs_perc);


	printf("Content-type: application/json\n\n");

	// {"cpu":{"load":[0.01,0.01,0.01],
	printf("{ \"cpu\": { \"load\": [ %.2f, %.2f, %.2f ], \"perc\": %.2f }, ", load_1m, load_5m, load_15m, cpu_perc);

	// "ram":{"size":100,"used":50,"free":50,"perc":49.98},
	printf("\"ram\": { \"size\": %d, \"used\": %d, \"free\": %d, \"perc\": %.2f }, ", ram_size, ram_used, ram_free, ram_perc);

	// "swap":{"size":100,"used":50,"free":50,"perc":49.98},
	printf("\"swap\": { \"size\": %d, \"used\": %d, \"free\": %d, \"perc\": %.2f }, ", swap_size, swap_used, swap_free, swap_perc);

	// disk":{"size":1000,"used":250,"free":750,"perc":25}}
	printf("\"disk\": { \"size\": %d, \"used\": %d, \"free\": %d, \"perc\": %.2f }, ", fs_size, fs_used, fs_free, fs_perc);

	printf("\"uptime\": %lu, ", info.uptime);

	printf("\"err\": 0 }\n");

	return 0;

}

