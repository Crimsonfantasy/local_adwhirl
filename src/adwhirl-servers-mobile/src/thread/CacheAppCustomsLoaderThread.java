/*
Copyright 2009-2010 AdMob, Inc.

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
*/

package thread;

import java.util.HashMap;
import java.util.Iterator;
import java.util.List;

import org.apache.log4j.Logger;

import com.amazonaws.services.simpledb.model.Item;

import util.CacheUtil;

public class CacheAppCustomsLoaderThread implements Runnable {
	static Logger log = Logger.getLogger("CacheCustomsLoaderThread");
/** adwhirl
 *  
	private List<Item> appsList;
*/
	private List<HashMap<String, Object>> appsList;
	private int threadId;
/**adwhirl
 * 
	public CacheAppCustomsLoaderThread(List<Item> appsList, int threadId) {
	    this.appsList = appsList;
	    this.threadId = threadId;
	}
*/
	public CacheAppCustomsLoaderThread(List<HashMap<String, Object>> appsList, int threadId) {
	    this.appsList = appsList;
	    this.threadId = threadId;
	}
	
	public void run() {
	    log.debug("CacheAppCustomsLoaderThread<"+ threadId + "> started");
/**adwhirl
 * 	
		for(Item item : appsList) {
			String aid = item.getName();		
			CacheUtil.loadAppCustom(aid);
		}
*/
	    Iterator<HashMap<String, Object>> iterator = appsList.iterator();
	    while (iterator.hasNext()) {
			HashMap<String, Object> map = iterator.next();
			String aid = (String) map.get("id");
			CacheUtil.loadAppCustom(aid);
			
	    
	    }
	}
}
