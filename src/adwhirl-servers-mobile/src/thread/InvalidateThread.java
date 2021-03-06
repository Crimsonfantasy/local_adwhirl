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

import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.List;

import mysql.Instance;
import mysql.MySQL;

import org.apache.log4j.Logger;

import util.AdWhirlUtil;
import util.CacheUtil;

import com.amazonaws.services.simpledb.model.Item;
import com.amazonaws.services.simpledb.model.SelectRequest;
import com.amazonaws.services.simpledb.model.SelectResult;

public class InvalidateThread implements Runnable {
	static Logger log = Logger.getLogger("InvalidateCustomsThread");
/** adwhirl	
	private static AmazonSimpleDB sdb;
*/
	private static MySQL mySQL ;
	public void run() {
		log.info("InvalidateCustomsThread started");
/**	adwhirl
		sdb = AdWhirlUtil.getSDB();
*/
		mySQL = MySQL.getMySQL();
		while(true) {
			invalidateCids();
			invalidateAids();
			
			try {
				Thread.sleep(30000);
			} catch (InterruptedException e) {
				log.error("Unable to sleep... continuing");
			}
		}
	}

	private void invalidateCids() {
		log.info("Invalidating customs");

/**
 * adwhirl
		String invalidsNextToken = null;
		do {
			SelectRequest invalidsRequest = new SelectRequest("select `itemName()` from `" + AdWhirlUtil.DOMAIN_CUSTOMS_INVALID + "`");
			invalidsRequest.setNextToken(invalidsNextToken);
			try {
			    SelectResult invalidsResult = sdb.select(invalidsRequest);
			    invalidsNextToken = invalidsResult.getNextToken();
			    List<Item> invalidsList = invalidsResult.getItems();
				    
				for(Item item : invalidsList) {
					String nid = item.getName();
					log.info("Cached response for custom <" + nid + "> may be invalid");
					CacheUtil.loadCustom(nid);
				}
			}
			catch(Exception e) {
				AdWhirlUtil.logException(e, log);

				// Eventually we'll get a 'stale request' error and need to start over.
				invalidsNextToken = null;
			}
		}
		while(invalidsNextToken != null);
*/	
		
		
		Instance instance = mySQL.select("select id from "  + AdWhirlUtil.DOMAIN_CUSTOMS_INVALID );
		ResultSet resultset = instance.getResuSet();
		
		try {
			while(resultset.next()){
				
				String nid = resultset.getString("id");
				log.info("Cached response for custom <" + nid + "> may be invalid");
				CacheUtil.loadCustom(nid);			
				
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
	}
	
	private void invalidateAids() {
		log.info("Invalidating aids");
/**
 * adwhirl
 * 
		String invalidsNextToken = null;
		do {
			SelectRequest invalidsRequest = new SelectRequest("select `itemName()` from `" + AdWhirlUtil.DOMAIN_APPS_INVALID + "`");
			invalidsRequest.setNextToken(invalidsNextToken);
			try {
			    SelectResult invalidsResult = sdb.select(invalidsRequest);
			    invalidsNextToken = invalidsResult.getNextToken();
			    List<Item> invalidsList = invalidsResult.getItems();
				    
				for(Item item : invalidsList) {
					String aid = item.getName();
					log.info("Cached response for app customs <" + aid + "> may be invalid");
					CacheUtil.loadAppCustom(aid);
					CacheUtil.loadApp(aid);
				}
			}
			catch(Exception e) {
				AdWhirlUtil.logException(e, log);

				// Eventually we'll get a 'stale request' error and need to start over.
				invalidsNextToken = null;
			}
		}
		while(invalidsNextToken != null);
		
*/
		Instance instance = mySQL.select("select id from " + AdWhirlUtil.DOMAIN_APPS_INVALID + "");
		ResultSet resultset = instance.getResuSet();
		
		try {
			while(resultset.next()){
				
				String aid = resultset.getString("id");
				log.info("Cached response for app customs <" + aid + "> may be invalid");
				CacheUtil.loadAppCustom(aid);
				CacheUtil.loadApp(aid);
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}
}
