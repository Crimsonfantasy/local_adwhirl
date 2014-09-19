package com.adwhirl.adapters;


import android.app.Activity;

import android.util.Log;

import com.adwhirl.AdWhirlLayout;
import com.adwhirl.AdWhirlLayout.ViewAdRunnable;
import com.adwhirl.obj.Ration;
import com.adwhirl.util.AdWhirlUtil;

import com.kuad.KuBanner;
import com.kuad.kuADListener;

public final class KuSoGiAdapter extends AdWhirlAdapter implements kuADListener{
	KuBanner KuSokiadView ;
	public KuSoGiAdapter(AdWhirlLayout adWhirlLayout, Ration ration) {
		super(adWhirlLayout, ration);
		// TODO Auto-generated constructor stub
	}

	

	@Override
	public void handle() {
		// TODO Auto-generated method stub
		 	AdWhirlLayout adWhirlLayout = adWhirlLayoutReference.get();

		    if (adWhirlLayout == null) {
		      return;
		    }
		    
		    Activity activity = adWhirlLayout.activityReference.get();
		    if (activity == null) {
		      return;
		    }
		    Log.e("KoSoki","ration.key");
		    
		    KuSokiadView = new KuBanner(activity);	
		    KuSokiadView.setAPID(ration.key);
		    KuSokiadView.setkuADListener(this);
		    
		
	}
	



	@Override
	public void onFailedRecevie(String arg0) {
		// TODO Auto-generated method stub
		/*
		 ??: why is the parameter of onFailedRecevie a string,not a View?  
		  
		 */
		Log.d(AdWhirlUtil.ADWHIRL, "KuSoki failure : "+arg0); 
		KuSokiadView.setkuADListener(null);
		KuSokiadView= null;
		
	    AdWhirlLayout adWhirlLayout = adWhirlLayoutReference.get();
	    if (adWhirlLayout == null) {
	      return;
	    }
	    
	    adWhirlLayout.rollover();
		
	}



	@Override
	public void onRecevie(String arg0) {
		// TODO Auto-generated method stub
		
			Log.e(AdWhirlUtil.ADWHIRL,"KuSoki onRecieve()");
		/**
		 KuSokiadView.setkuADListener(null); play a import role on this function.
		 Because...
		 
		 When KusSoGi API receive an ad , the onRecevie(String arg0) will trap.
		 
		 Such like AD displaying Animation ,  KusSoGi API continually receive message Animation
		 fragment from server , then onRecevie(String arg0) is trapped  each time.
		 
		 When function onRecevie(String arg0) execute very times during a short time, adWhirlLayout.handler.post()
		 and adWhirlLayout.rotateThreadedDelayed will put too many class runnable into message queue
		 to make Android system crash down. 
		  
		  
		 
		 */
			KuSokiadView.setkuADListener(null);
		    AdWhirlLayout adWhirlLayout = adWhirlLayoutReference.get();

		    if (adWhirlLayout == null) {
		      return;
		    }
		    
	
	
		    adWhirlLayout.adWhirlManager.resetRollover();
		    adWhirlLayout.handler.post(new ViewAdRunnable(adWhirlLayout, KuSokiadView));
		    adWhirlLayout.rotateThreadedDelayed();
		
	}

}
