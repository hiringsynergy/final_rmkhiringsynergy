#include<iostream>
using namespace std;
int main()
{
	string a;
	int i,j,p=0;
	cin>>a;
	for(i=0;i<a.size();i++)
	{
		if(a[i]>=65&&a[i]<=90||a[i]>=97&&a[i]<=122)
		p++;
	}
	cout<<p;
	return 0;
}